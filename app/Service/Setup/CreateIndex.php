<?php

declare(strict_types=1);

namespace App\Service\Setup;

use Elasticsearch\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateIndex
{
    const File = 'resources/ElasticsearchIndex.json';

    public function __construct(private Client $client)
    {
    }


    function run(Command $command)
    {
        $command->info('read ' . self::File);
        $text = Storage::disk('root')->get(self::File);
        if (is_null($text)) {
            $command->error(self::File . ' does not exist.');
            return;
        }

        $itemzz = json_decode($text, true);
        if (is_null($itemzz)) {
            $command->error(self::File . ' is not a valid JSON file.');
            return;
        }

        foreach ($itemzz as $item) {
            if ($this->client->indices()->exists(['index' => $item['index']])) {
                $command->info('delete old index ' . $item['index']);
                $this->client->indices()->delete(['index' => $item['index']]);
            }

            $command->info('create index ' . $item['index']);
            $this->client->indices()->create($item);
        }
        $command->info('ok ' . self::class);
    }
}