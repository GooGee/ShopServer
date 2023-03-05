<?php

declare(strict_types=1);

namespace App\Service\Shopee;

use GuzzleHttp\Client;

class HttpClient
{
    function getClient()
    {
        return new Client([
            'base_uri' => 'https://shopee.sg/api/v4/',
        ]);
    }
}