<?php

declare(strict_types=1);

namespace App\Ad\Notification\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageNotificationRequest extends ReadPageRequest
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

            'text' => [
                'required',
                'string',
                'max:1222',
                'sometimes',
            ],


        ];
    }
}