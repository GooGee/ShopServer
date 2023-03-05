<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\CreateOne;

use App\Models\Admin;

use App\Models\FileInfo;
use App\Repository\FileInfoRepository;

class CreateOneFileInfo
{
    public function __construct(private FileInfoRepository $repository)
    {
    }

    function __invoke(Admin $user,
                      string $location,
                      string $mime,
                      string $uri,
                      int    $width = 0,
                      int    $height = 0,
    )
    {
        $item = new FileInfo();

        $item->location = $location;
        $item->mime = $mime;
        $item->uri = $uri;
        $item->width = $width;
        $item->height = $height;

        $item->save();
        $item->refresh();

        event(new CreateOneFileInfoEvent($user, $item));

        return $item;
    }

}