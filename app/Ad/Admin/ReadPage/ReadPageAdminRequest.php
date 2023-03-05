<?php

declare(strict_types=1);

namespace App\Ad\Admin\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageAdminRequest extends ReadPageRequest
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

            'name' => [
                'string',
                'max:33',
                'sometimes',
            ],

            'email' => [
                'string',
                'max:111',
                'sometimes',
            ],


        ];
    }
}