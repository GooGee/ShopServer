<?php

namespace App\AbstractBase;

class PageParameter
{
    /** @var array<string, string> */
    public array $filter = [];

    public int $page;
    public int $perPage;

    public string $sortField;
    public string $sortOrder;

    /**
     * @param array<string, mixed> $data
     * @param int $perPage
     */
    public function __construct(array $data, int $perPage)
    {
        $this->filter = $data['filter'] ?? [];

        $this->page = $data['pagination']['page'] ?? 1;
        $this->perPage = $data['pagination']['perPage'] ?? $perPage;

        $this->sortField = $data['sort']['field'];
        $this->sortOrder = $data['sort']['order'] ?? 'asc';
    }

}