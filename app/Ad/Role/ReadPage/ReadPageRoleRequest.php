<?php

declare(strict_types=1);

namespace App\Ad\Role\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageRoleRequest extends ReadPageRequest
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
                'required',
                'string',
                'max:111',
                'sometimes',
            ],


        ];
    }
}