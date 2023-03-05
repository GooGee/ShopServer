<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\DeleteOne;

use Illuminate\Support\Facades\Storage;

class DeleteOneFileInfoInDiskListener
{
    function handle(DeleteOneFileInfoEvent $event)
    {
        if ($event->item->location) {
            Storage::delete($event->item->location);
        }
    }
}