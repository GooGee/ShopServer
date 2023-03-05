<?php

declare(strict_types=1);

namespace App\Service\Setup;

use App\AbstractBase\AbstractImportFile;
use App\Models\Tag;
use App\Repository\TagRepository;
use Illuminate\Console\Command;

class ImportTag extends AbstractImportFile
{
    // https://openapi.etsy.com/v2/listings/trending
    private $filezz = ['trending100.json', 'trending200.json', 'trending300.json', 'trending400.json'];
    private $index = 0;

    public function __construct(private TagRepository $repository)
    {
    }

    function getFile(): string
    {
        return 'resources/' . $this->filezz[$this->index];
    }

    function run(Command $command)
    {
        $namezz = [];
        foreach ($this->filezz as $key => $item) {
            $this->index = $key;
            $tabzz = $this->getNamezz($command);
            if (count($tabzz)) {
                $namezz = array_merge($namezz, $tabzz);
            }
        }

        $this->insertAll(collect($namezz)->unique(function ($item) {
            return strtolower($item);
        })->all());
    }

    function getNamezz(Command $command)
    {
        $result = $this->readJson($command);
        if (is_null($result)) {
            return [];
        }

        if (is_null($result['results'])) {
            return [];
        }

        $namezz = [];
        foreach ($result['results'] as $data) {
            $tabzz = $data['tags'] ?? [];
            if (count($tabzz)) {
                $namezz = array_merge($namezz, $tabzz);
            }
        }

        return $namezz;
    }

    function insertAll(array $namezz)
    {
        $dtCreate = now();
        $dtUpdate = now();
        $itemzz = [];
        foreach ($namezz as $name) {
            $itemzz[] = compact('dtCreate', 'dtUpdate', 'name');
        }

        Tag::unguard();
        Tag::query()->insert($itemzz);
        Tag::reguard();
    }
}