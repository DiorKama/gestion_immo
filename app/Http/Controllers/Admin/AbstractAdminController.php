<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\AbstractEntity;
use App\Traits\CanUploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AbstractAdminController extends Controller
{
    use CanUploadImage;

    /**
     * @var AbstractEntity
     */
    protected $entity;

    /**
     * @var string
     */
    protected $resourceName;

    /**
     * @param AbstractEntity $entity
     *
     * @throws \Throwable
     */
    public function __construct(AbstractEntity $entity)
    {
        throw_if(
            get_class($entity) === AbstractEntity::class,
            new \Exception('Please inject your own entity into the controller construct')
        );
        $this->entity = $entity;

        if (!$this->resourceName) {
            $this->resourceName = Str::camel($entity->getTable());
        }
    }

    /**
     * @param Request $request
     *
     * @return View
     */
    public function index(Request $request)
    {
        ${$this->resourceName} = $this->getCollection($request);

        $filters = $this->getFilters();

        return view(
            $this->getViewName('index'),
            compact(
                $this->resourceName,
                'filters'
            )
        );
    }

    /**
     * @return View
     */
    public function create()
    {
        return view(
            $this->getViewName('create'),
            $this->getFilters()
        );
    }


    public function store(
        $request = null,
        $useCase = null
    ) {
        $request = $this->resolveRequest($request);
        $data = $request->validated();

        if ($useCase) {
            $this->entity = $useCase->handle($data);
        } else {
            foreach ($this->files as $fileGroup => $fileName) {
                if (
                    isset($data[$fileGroup])
                    && isset($data[$fileGroup][$fileName])
                ) {
                    unset($data[$fileGroup][$fileName]);
                    if (!$data[$fileGroup]) {
                        unset($data[$fileGroup]);
                    }
                }
            }

            $this->entity = $this
                ->entity
                ->create(
                    $data
                );
        }

        $fileUploadError = false;
        foreach ($this->files as $fileGroup => $fileName) {
            $file = "${fileGroup}.${fileName}";
            if ($request->hasFile($file)) {
                $uploadResult = $this->uploadImage(
                    $request->file($file),
                    $fileGroup
                );
                if ($uploadResult['success'] !== true) {
                    $fileUploadError = $uploadResult['error'];
                }
            }
        }

        if ($fileUploadError) {
            return back()->withErrors($fileUploadError);
        }

        $message = __(
            'form.added',
            [
                'title' => __("{$this->resourceName}.added"),
            ]
        );

        $redirect = $request->redirect();

        if ($redirect) {
            return redirect()
                ->to($redirect)
                ->withMessage($message);
        }

        return redirect()
            ->route($this->getRouteName('index'))
            ->withMessage($message);
    }

    /**
     * @param AbstractEntity $entity
     *
     * @return View
     */
    public function edit(
        AbstractEntity $entity
    ) {
        $this->entity = $entity;

        return view(
            $this->getViewName('edit'),
            array_merge(
                [
                    Str::singular($this->resourceName) => $this->entity,
                ],
                $this->getFilters()
            )
        );
    }

    public function update(
        AbstractEntity $entity,
        $request = null,
        $useCase = null
    ) {
        $this->entity = $entity;

        $request = $this->resolveRequest($request);

        $data = $request->validated();
        if ($useCase) {
            $useCase->handle($this->entity, $data);
        } else {
            $this->entity->update($data);
        }

        if (
            $useCase
            && $useCase->fails()
        ) {
            return back()
                ->withErrors($useCase->getMessageBag());
        }

        $fileUploadError = false;
        foreach ($this->files as $fileGroup => $fileName) {
            $file = "${fileGroup}.${fileName}";

            if ($request->hasFile($file)) {
                $uploadResult = $this->uploadImage(
                    $request->file($file),
                    $fileGroup
                );
                if ($uploadResult['success'] !== true) {
                    $fileUploadError = $uploadResult['error'];
                }
            }
        }
        if ($fileUploadError) {
            return back()->withErrors($fileUploadError);
        }

        $redirect = $request->redirect();

        $message = __(
            'form.updated',
            [
                'title' => (string) $entity,
            ]
        );

        if ($redirect) {
            return redirect()
                ->to($redirect)
                ->withMessage($message);
        }

        return redirect()
            ->route($this->getRouteName('index'))
            ->withMessage($message);
    }

    public function destroy(
        AbstractEntity $entity,
        $useCase = null
    ) {
        $this->entity = $entity;

        $message = __(
            'form.deleted',
            [
                'title' => (string) $this->entity,
            ]
        );

        if ($useCase) {
            $useCase->handle($this->entity);
        } else {
            $this->entity->delete();
        }

        $redirect = request('redirect');

        if ($redirect) {
            return redirect()
                ->to($redirect)
                ->withMessage($message);
        }

        return back()
            ->withMessage(
                __(
                    'form.deleted',
                    [
                        'title' => (string) $this->entity,
                    ]
                )
            );
    }

    /**
     * @param string $type
     *
     * @return string
     */
    protected function getViewName(
        string $type
    ) {
        return 'admin.' . Str::snake($this->resourceName) . '.' . $type;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    protected function getCollection($request)
    {
        return $this
            ->entity
            ->crudFilter($request->all())
            ->paginate($request->get('perPage') ?: config('limit'));
    }

    /**
     * @return array
     */
    protected function getFilters()
    {
        return [];
    }

    /**
     * @param string $type
     *
     * @return string
     */
    protected function getRouteName(
        string $type
    ) {
        return 'admin.' . Str::kebab(($this->resourceName)) . '.' . $type;
    }

    /**
     * @return AbstractEntity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param null $request
     *
     * @return AdminRequest
     */
    protected function resolveRequest($request = null)
    {
        return $request
            ?: resolve(AdminRequest::class);
    }
}
