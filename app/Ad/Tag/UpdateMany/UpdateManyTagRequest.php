<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateMany;

use App\AbstractBase\AbstractRequest;

class UpdateManyTagRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:33',
            ],

            'id' => [
                'integer',
                'required',
                'min:1',
            ],


        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::getRulezzForItemzz();
    }
}