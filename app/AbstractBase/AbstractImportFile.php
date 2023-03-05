<?php

declare(strict_types=1);

namespace App\AbstractBase;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

abstract class AbstractImportFile
{
    abstract function getFile(): string;

    function read(Command $command): string|null
    {
        $command->info('read ' . $this->getFile());
        $text = Storage::disk('root')->get($this->getFile());
        if (is_null($text)) {
            $command->error($this->getFile() . ' does not exist.');
            return null;
        }
        return $text;
    }

    function readJson(Command $command): array|null
    {
        $text = $this->read($command);

        $result = json_decode($text, true);
        if (is_null($result)) {
            $command->error($this->getFile() . ' is not a valid JSON file.');
            return null;
        }
        return $result;
    }
}