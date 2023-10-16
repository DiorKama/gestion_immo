<?php

namespace App\UseCases\Traits;

use Illuminate\Support\Facades\Validator;

trait Validation
{
    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * @param array $data
     * @param bool $throwOnValidation
     *
     * @throws \Throwable
     *
     * @return array
     */
    public function validate(
        array $data,
        $throwOnValidation = true
    ) {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            return [];
        } else {
            return $validator->validated();
        }
    }
}
