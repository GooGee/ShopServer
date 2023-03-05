<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Auto-generated Migration
 */
return new class extends Migration
{
    public function up()
    {
        DB::statement('ALTER TABLE
          Address
        CHANGE
          name `name` VARCHAR(33) NOT NULL,
        CHANGE
          text `text` VARCHAR(333) NOT NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE
          `Address`
        CHANGE
          `name` name VARCHAR(111) NOT NULL,
        CHANGE
          `text` text VARCHAR(111) NOT NULL');
    }
};
