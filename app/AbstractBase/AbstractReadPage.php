<?php

declare(strict_types=1);

namespace App\AbstractBase;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractReadPage
{

    static function convertEsResponse(array $response, PageParameter $parameter)
    {
        $itemzz = array_map(function ($item) {
            return $item['_source'];
        }, $response['hits']['hits']);
        return new LengthAwarePaginator($itemzz,
            $response['hits']['total']['value'],
            $parameter->perPage,
            $parameter->page);
    }

    /**
     * @param array<string, mixed> $data
     * @param int $perPage
     */
    static function makePageParameter(array $data, int $perPage)
    {
        return new PageParameter($data, $perPage);
    }

    static function makeReadPageQueryBuilder(Builder $qb, PageParameter $parameter)
    {
        return new ReadPageQueryBuilder($qb, $parameter);
    }
}