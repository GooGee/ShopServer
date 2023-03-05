<?php

namespace App\AbstractBase;

use Illuminate\Foundation\Http\FormRequest;

class DeleteManyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'idzz' => ['array', 'max:111', 'required'],
            'idzz.*' => ['integer'],

        ];
    }
}