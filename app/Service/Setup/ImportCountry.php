<?php

declare(strict_types=1);

namespace App\Service\Setup;

use App\AbstractBase\AbstractImportFile;
use App\Models\Country;
use App\Repository\CountryRepository;
use Illuminate\Console\Command;

class ImportCountry extends AbstractImportFile
{
    const File = 'resources/country.json';

    public function __construct(private CountryRepository $repository)
    {
    }

    function getFile(): string
    {
        return self::File;
    }

    function run(Command $command)
    {
        $result = $this->readJson($command);
        if (is_null($result)) {
            return;
        }

        $dtCreate = now();
        $dtUpdate = now();
        $namezz = array_values($result);
        $itemzz = [];
        foreach ($namezz as $name) {
            $itemzz[] = compact('dtCreate', 'dtUpdate', 'name');
        }

        Country::unguard();
        Country::query()->insert($itemzz);
        Country::reguard();
    }
}