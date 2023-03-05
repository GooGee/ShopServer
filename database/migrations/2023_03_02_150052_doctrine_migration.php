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
          User
        ADD
          `aaOrder` INT DEFAULT 0 NOT NULL,
        ADD
          `aaSpend` BIGINT DEFAULT 0 NOT NULL,
        DROP
          dtSuspend');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `User` ADD dtSuspend DATETIME DEFAULT NULL, DROP `aaOrder`, DROP `aaSpend`');
    }
};
