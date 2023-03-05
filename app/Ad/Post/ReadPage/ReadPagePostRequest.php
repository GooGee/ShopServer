<?php

declare(strict_types=1);

namespace App\Ad\Post\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPagePostRequest extends ReadPageRequest
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

            'reviewId' => [
                'required',
                'exists:Review,id',
                'integer',
                'min:1',
                'sometimes',
            ],


        ];
    }
}