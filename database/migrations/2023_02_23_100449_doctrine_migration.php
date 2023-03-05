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
        DB::statement('ALTER TABLE permissions ADD `moderator` VARCHAR(111) NOT NULL');
        DB::statement('ALTER TABLE roles ADD `isUserCreated` TINYINT(1) DEFAULT 0 NOT NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `permissions` DROP `moderator`');
        DB::statement('ALTER TABLE `roles` DROP `isUserCreated`');
    }
};
