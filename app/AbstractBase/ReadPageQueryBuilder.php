<?php
declare(strict_types=1);

namespace App\AbstractBase;

use Illuminate\Database\Eloquent\Builder;

class ReadPageQueryBuilder
{
    public function __construct(private Builder $qb, private PageParameter $parameter)
    {
    }

    function addDateFilter(string $key = 'dtCreate')
    {
        if (isset($this->parameter->filter['dtStart'])) {
            $this->qb->where($key, '>=', $this->parameter->filter['dtStart']);
        }
        if (isset($this->parameter->filter['dtEnd'])) {
            $this->qb->where($key, '<', $this->parameter->filter['dtEnd']);
        }
        return $this;
    }

    function addFilter(string $key, string $operator = '=')
    {
        if (isset($this->parameter->filter[$key])) {
            $this->qb->where($key, $operator, $this->parameter->filter[$key]);
        }
        return $this;
    }

    /**
     * @param string[] $keyzz
     * @return $this
     */
    function addFilterzz(array $keyzz)
    {
        foreach ($keyzz as $key) {
            $this->addFilter($key);
        }
        return $this;
    }

    function addFilterSearch(string $key)
    {
        if (isset($this->parameter->filter[$key])) {
            $this->qb->where($key, 'LIKE', "%{$this->parameter->filter[$key]}%");
        }
        return $this;
    }

    /**
     * @param string[] $keyzz
     * @return $this
     */
    function addFilterzzSearch(array $keyzz)
    {
        foreach ($keyzz as $key) {
            $this->addFilterSearch($key);
        }
        return $this;
    }

    function addSort()
    {
        if (isset($this->parameter->sortField)) {
            $this->qb->orderBy($this->parameter->sortField, $this->parameter->sortOrder);
        }
        return $this;
    }

    function paginate(array $columnzz = ['*'])
    {
        return $this->qb->paginate($this->parameter->perPage, $columnzz, 'page', $this->parameter->page);
    }
}