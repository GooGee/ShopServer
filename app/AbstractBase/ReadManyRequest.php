<?php

namespace App\AbstractBase;

class ReadManyRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'idzz' => ['array', 'max:111', 'required'],
            'idzz.*' => ['integer'],

        ];
    }
}