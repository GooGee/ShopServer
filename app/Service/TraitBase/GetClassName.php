<?php

declare(strict_types=1);

namespace App\Service\TraitBase;

use Illuminate\Support\Str;

trait GetClassName
{
    static function getClassName()
    {
        $rc = new \ReflectionClass(static::class);
        return $rc->getShortName();

        $namezz = explode('\\', static::class);
        return array_pop($namezz);
    }

    static function getEsIndexName()
    {
        return Str::snake(static::getClassName());
    }

    static function getFullClassName()
    {
        return static::class;
    }
}