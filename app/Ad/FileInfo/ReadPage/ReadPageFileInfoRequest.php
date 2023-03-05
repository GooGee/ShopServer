<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageFileInfoRequest extends ReadPageRequest
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

            'mime' => [
                'required',
                'string',
                'max:111',
                'sometimes',
            ],


        ];
    }
}