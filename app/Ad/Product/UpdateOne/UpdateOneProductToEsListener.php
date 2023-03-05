<?php

declare(strict_types=1);

namespace App\Ad\Product\UpdateOne;

use Elasticsearch\Client;

class UpdateOneProductToEsListener
{
    public function __construct(private Client $client)
    {
    }

    function handle(UpdateOneProductEvent $event)
    {
        $this->client->index([
            'index' => $event->item->getEsIndexName(),
            'id' => $event->item->id,
            'body' => $event->item->toArray(),
        ]);
    }
}