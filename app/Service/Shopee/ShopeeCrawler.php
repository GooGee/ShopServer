<?php

declare(strict_types=1);

namespace App\Service\Shopee;

class ShopeeCrawler
{

    private \GuzzleHttp\Client $client;

    public string $body = '';

    function __construct(HttpClient $client)
    {
        $this->client = $client->getClient();
    }

    function getCategory()
    {

        $uri = 'pages/get_category_tree';

        $response = $this->client->request('GET', $uri);

        $this->body = $response->getBody()->getContents();

    }

    function getProductDetail(int $itemid, int $shopid)
    {
        $query = http_build_query(compact('itemid', 'shopid'));
        $response = $this->client->request('GET', 'item/get?' . $query);
        $this->body = $response->getBody()->getContents();
    }

    function getProductzzByCategoryId(int $categoryId, int $offset = 0)
    {
        $query = http_build_query([
            'bundle' => 'category_landing_page',
            'catid' => $categoryId,
            'cat_level' => 2,
            'limit' => 60,
            'offset' => $offset,
        ]);

        $response = $this->client->request('GET', 'recommend/recommend?' . $query);
        $this->body = $response->getBody()->getContents();
    }

    function getRatingzz(int $itemid, int $shopid)
    {
        $query = http_build_query([
            'filter' => 1,
            'flag' => 1,
            'offset' => 0,
            'limit' => 6,
            'type' => 0,
            'itemid' => $itemid,
            'shopid' => $shopid,
        ]);
        $response = $this->client->request('GET', 'item/get_ratings?' . $query);
        $this->body = $response->getBody()->getContents();
    }

}