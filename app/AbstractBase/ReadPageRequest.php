<?php

declare(strict_types=1);

namespace App\AbstractBase;

use Illuminate\Validation\Rule;

class ReadPageRequest extends AbstractRequest
{
    static function getRulezzForPage()
    {
        $keyzz = array_keys(static::getRulezz());
        $keyzz[] = 'id'; // sort by id

        $rulezz = [
            'pagination.page' => ['integer', 'min:1'],
            'pagination.perPage' => ['integer', 'min:5', 'max:1222'],
            'sort.field' => ['string'],
            'sort.order' => ['string', Rule::in(['asc', 'desc'])],
        ];
        foreach (static::getRulezz() as $key => $item) {
            $rulezz['filter.' . $key] = $item;
        }
        return $rulezz;
    }

    static function getRulezz()
    {
        return [
        ];
    }
}