<?php

namespace App\Traits;

use App\Contracts\CanHaveFiles;
use App\Services\FileService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\File as SfFile;

trait CanUploadImage
{
    use StorageTrait;

    /**
     * @param SfFile $file
     * @param string $group
     *
     * @return array
     */
    protected function uploadImage(
        $file,
        string $group
    ) {
        return $this->storeFile(
            $file,
            $this->entity,
            $group,
            'jpeg,jpg,png'
        );
    }

    /**
     * @param SfFile $uploadedFile
     * @param CanHaveFiles $entity
     * @param string $group
     * @param string|array|null $allowedFileTypes
     * @param null|int $maxFiles
     * @param null|int $maxSize
     * @param null|string $fileName
     *
     * @return array
     */
    protected function storeFile(
        $uploadedFile,
        CanHaveFiles $entity,
        string $group,
        $allowedFileTypes = null,
        int $maxFiles = null,
        int $maxSize = null,
        $fileName = null
    ) {
        $fileService = resolve(FileService::class);

        $countFiles = null;
        if ($maxFiles) {
            $countFiles = $entity
                ->files()
                ->where('group', $group)
                ->count();
        }

        $validFileValidator = $this->validateFile(
            $uploadedFile,
            $allowedFileTypes,
            $maxSize,
            $maxFiles,
            $countFiles
        );

        if ($validFileValidator->messages()->isNotEmpty()) {
            return [
                'success' => false,
                'error' => Arr::first($validFileValidator->messages()->get('file') ?: []),
            ];
        }

        $file = $fileService->saveEntityImage(
            $uploadedFile,
            $entity->id,
            entity_type($entity),
            $group,
            $fileName
        );

        if (!$file->exists) {
            return [
                'success' => false,
                'error' => $file->errors()->first(),
            ];
        }

        $resource = fopen($uploadedFile, 'r');

        try {
            $this->getStorageDisk()->put($file->path, $resource);
        } catch (\Exception $e) {
            Log::critical(
                'CanUploadImage@storeFile error',
                [
                    'entity_id' => $entity->id,
                    'entity_type' => entity_type($entity),
                    'group' => $group,
                    'exception' => $e,
                ]
            );

            return [
                'success' => false,
                'error' => __('errors.file.upload.generic_error'),
            ];
        }

        return [
            'success' => true,
            'id' => $file->id,
        ];
    }

    /**
     * @param SfFile $file
     * @param string|array|null $allowedFileTypes
     * @param int|null $maxSize
     * @param null|int $maxFiles
     * @param null|int $countFiles
     *
     * @return \Illuminate\Validation\Validator
     */
    protected function validateFile(
        $file,
        $allowedFileTypes,
        int $maxSize = null,
        int $maxFiles = null,
        int $countFiles = null
    ) {
        $fileValidationRule = [
            'required',
            'file',
        ];

        if ($allowedFileTypes) {
            $allowedFileTypes = is_array($allowedFileTypes)
                ? implode(',', $allowedFileTypes)
                : $allowedFileTypes;

            $allowedFileTypes = str_replace('.', '', $allowedFileTypes);
            $fileValidationRule[] = 'mimes:' . $allowedFileTypes;
        }

        if ($maxSize) {
            $fileValidationRule[] = 'max:' . ($maxSize * 1024);
        }

        $validator = Validator::make(
            [
                'file' => $file,
            ],
            [
                'file' => implode(
                    '|',
                    $fileValidationRule
                ),
            ]
        );

        if ($maxFiles) {
            $validator->after(
                function (\Illuminate\Validation\Validator $validator) use ($maxFiles, $countFiles) {
                    if ($countFiles >= $maxFiles) {
                        $validator
                            ->errors()
                            ->add(
                                'field',
                                __('validation.file_limit')
                            );
                    }
                }
            );
        }

        $validator->passes();

        return $validator;
    }
}
