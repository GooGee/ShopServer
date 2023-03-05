<?php

declare(strict_types=1);

namespace App\Ad\AdminSession\CreateOne;

use Illuminate\Foundation\Http\FormRequest;

class CreateOneAdminSessionRequest extends FormRequest
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

            'name' => [
                'regex:/^[A-Za-z][A-Za-z0-9]{2,33}$/',
                'max:33',
                'required',
            ],

            'password' => [
                'required',
                'string',
                'max:111',
                'min:8',
            ],


        ];
    }
}