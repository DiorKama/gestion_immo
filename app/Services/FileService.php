<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\File as SfFile;

class FileService
{
    /**
     * Save record with a uniquely generated folder/filename and persist to DB
     *
     * @param SfFile $image
     * @param int $entityId
     * @param string $entityType
     * @param string $group
     * @param string|null $fileName
     *
     * @return File|null
     */
    public function saveEntityImage(
        SfFile $image,
        int $entityId,
        string $entityType,
        string $group,
        $fileName = null
    ) {
        if (!$fileName) {
            $fileName = $this->generateFileName(
                $entityId,
                $entityType,
                $group,
                $image
            );
        }

        $folder = $this->generateFolderPath(
            $entityId,
            $group
        );

        $file = File::create(
            [
                'entity_id' => $entityId,
                'entity_type' => $entityType,
                'path_dir' => $folder,
                'file_name' => $fileName,
                'group' => $group,
            ]
        );

        if (!$file->exists) {
            Log::warning(
                'file record failed to save',
                $file->errors()->all()
            );
        }

        return $file;
    }

    /**
     * Generate unique file name
     * e.g.: 443294c031adac55b2e7da0c37ee83e5e1a5a311.jpg
     *
     * @param int $entityId
     * @param string $entityType
     * @param string $group
     * @param SfFile $file
     *
     * @return string
     */
    public  function generateFileName(
        int $entityId,
        string $entityType,
        string $group,
        SfFile $file
    ) {
        return sprintf(
            '%s.%s',
            sha1($entityId . $entityType . $group . microtime(false)),
            $file->guessExtension()
        );
    }

    /**
     * Generate folder taking into account file type and entity id.
     * e.g.: /pi/picture/q3ngek/
     *
     * @param int $entityId
     * @param string $group
     *
     * @return string
     */
    public function generateFolderPath(
        int $entityId,
        string $group
    ) {
        return sprintf(
            '/%s/%s/%s/',
            $group,
            date('Y'),
            date('m')
        );
    }
}
