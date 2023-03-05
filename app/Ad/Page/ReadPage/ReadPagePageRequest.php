<?php

declare(strict_types=1);

namespace App\Ad\Page\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPagePageRequest extends ReadPageRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::getRulezzForPage();
    }

    static function getRulezz()
    {
        return [

            'title' => [
                'required',
                'string',
                'max:111',
                'sometimes',
            ],

            'content' => [
                'required',
                'string',
                'sometimes',
            ],


        ];
    }
}