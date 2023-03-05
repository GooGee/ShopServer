<?php

declare(strict_types=1);

namespace App\Ad\Review\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageReviewRequest extends ReadPageRequest
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

            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5',
                'sometimes',
            ],


        ];
    }
}