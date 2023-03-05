<?php

declare(strict_types=1);

namespace App\Ad\Product\ReadPage;


use App\AbstractBase\AbstractReadPage;
use App\AbstractBase\PageParameter;
use App\Models\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Elasticsearch\Client;

class ReadPageProduct extends AbstractReadPage
{
    public function __construct(private ProductRepository  $repository,
                                private CategoryRepository $categoryRepository,
                                private Client             $client)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, ProductRepository::PageSize);
        $page = self::convertEsResponse($this->search($parameter), $parameter);
        Product::unguard();
        $page->transform(function (array $item) {
            return $this->repository->query()->make($item);
        });
        Product::reguard();
        return $page;
    }

    function search(PageParameter $parameter): array
    {
        $params = [
            'index' => Product::getEsIndexName(),
            'from' => ($parameter->page - 1) * $parameter->perPage,
            'size' => $parameter->perPage,
            'sort' => [],
            'body' => [],
        ];

        if (isset($parameter->sortField)) {
            $params['sort'][] = "$parameter->sortField:$parameter->sortOrder";
        }

        $name = $parameter->filter['name'] ?? null;
        $categoryId = $parameter->filter['categoryId'] ?? null;
        $dtStart = $parameter->filter['dtStart'] ?? null;
        $dtEnd = $parameter->filter['dtEnd'] ?? null;


        $filter = [];
        if (isset($categoryId)) {
            $idzz = $this->categoryRepository
                ->getAllChild()
                ->where('parentId', $categoryId)
                ->pluck('id')
                ->all();

            if (count($idzz)) {
                $filter[] = ['terms' => ['categoryId' => $idzz]];
            }
        }

        $time = ' 00:00:00';
        $dateRange = [];
        if (isset($dtStart)) {
            $dateRange['gte'] = $dtStart . $time;
        }
        if (isset($dtEnd)) {
            $dateRange['lt'] = $dtEnd . $time;
        }
        if (count($dateRange)) {
            $filter[] = ['range' => ['dtCreate' => $dateRange]];
        }

        $bool = [];
        if (isset($name)) {
            $bool['must'] = [
                'multi_match' => [
                    'query' => $name,
                    'fields' => ['name', 'detail'],
                    'fuzziness' => 1,
                ],
            ];
        }

        if (count($filter)) {
            if (count($filter) === 1) {
                $bool['filter'] = $filter[0];
            } else {
                $bool['filter'] = $filter;
            }
        }

        if (count($bool)) {
            $params['body'] = ['query' => ['bool' => $bool,]];
        }

        return $this->client->search($params);
    }
}