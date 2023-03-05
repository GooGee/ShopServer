<?php

declare(strict_types=1);

namespace App\Ad\Product\DeleteOne;

use Elasticsearch\Client;

class DeleteOneProductToEsListener
{
    public function __construct(private Client $client)
    {
    }

    function handle(DeleteOneProductEvent $event)
    {
        $this->client->delete([
            'index' => $event->item->getEsIndexName(),
            'id' => $event->item->id,
        ]);
    }
}