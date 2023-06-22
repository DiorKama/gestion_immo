<?php

namespace App\Http\Requests;

use App\Models\AbstractEntity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AdminRequest extends FormRequest
{
    /**
     * @var array
     */
    protected $excludes = [
        'created_at',
        'updated_at',
        'id',
    ];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $entity = $this->getEntity();
        $entityId = $this->get('id');
        $rules = $entity::$rules;

        // unique_with rule requires entity id on update to exclude current entity from lookup
        if ($entityId) {
            $rules = collect($rules)
                ->map(function ($rule) use ($entityId) {
                    if (
                        is_string($rule)
                        && !str_contains($rule, 'unique_with:')
                    ) {
                        return $rule;
                    }

                    $parts = is_array($rule)
                        ? collect($rule)
                        : collect(explode('|', $rule));

                    $parts = $parts
                        ->map(function ($part) use ($entityId) {
                            if (!Str::startsWith($part, 'unique_with:')) {
                                return $part;
                            }

                            return $part . ',' . $entityId;
                        });

                    return is_array($rule)
                        ? $parts->all()
                        : $parts->implode('|');
                })
                ->all();
        }

        return collect(Schema::getColumnListing($entity->getTable()))
            ->filter(
                function ($column) use ($rules) {
                    return !in_array(
                        $column,
                        array_merge(
                            array_keys($rules),
                            $this->excludes
                        )
                    );
                }
            )
            ->flatMap(
                function ($column) {
                    return [
                        $column => 'nullable',
                    ];
                }
            )
            ->merge($rules)
            ->all();
    }

    /**
     * @return AbstractEntity
     */
    protected function getEntity()
    {
        $className = 'App\\Http\\Controllers\\' . ucfirst($this->getEntityName()) . 'Controller';

        return resolve($className)
            ->getEntity();
    }

    /**
     * @return string
     */
    protected function getEntityName()
    {
        $pieces = explode('.', $this->route()->getName());

        return Str::camel(Str::singular($pieces[0]));
    }

    /**
     * @return null|string
     */
    public function redirect()
    {
        return $this->input('redirect');
    }

    protected function prepareForValidation()
    {
        parent::prepareForValidation();

        // this is for updating unique rules
        $entity = $this
            ->route()
            ->parameter(
                Str::singular($this->getEntityName())
            );

        if ($entity) {
            $this->merge(
                [
                    'id' => $entity->id,
                ]
            );
        }
    }
}
