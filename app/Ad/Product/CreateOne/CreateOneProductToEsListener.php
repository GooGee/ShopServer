<?php

declare(strict_types=1);

namespace App\Ad\Product\CreateOne;

use Elasticsearch\Client;

class CreateOneProductToEsListener
{
    public function __construct(private Client $client)
    {
    }

    function handle(CreateOneProductEvent $event)
    {
        $this->client->index([
            'index' => $event->item->getEsIndexName(),
            'id' => $event->item->id,
            'body' => $event->item->toArray(),
        ]);
    }
}