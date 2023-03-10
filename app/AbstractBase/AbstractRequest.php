<?php

declare(strict_types=1);

namespace App\AbstractBase;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractRequest extends FormRequest
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
        return static::getRulezz();
    }

    static function getRulezzForItemzz()
    {
        $rulezz = [
            'itemzz' => ['array', 'max:111', 'required'],
        ];
        foreach (static::getRulezz() as $key => $item) {
            $rulezz['itemzz.*.' . $key] = $item;
        }
        return $rulezz;
    }

    /**
     * @return array<string, string[]>
     */
    abstract static function getRulezz();

}