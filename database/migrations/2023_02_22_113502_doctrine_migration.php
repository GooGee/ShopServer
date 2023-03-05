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
        DB::statement('CREATE TABLE `User` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `name` VARCHAR(33) NOT NULL,
          `email` VARCHAR(111) NOT NULL,
          `password` VARCHAR(111) NOT NULL,
          `remember_token` VARCHAR(111) DEFAULT NULL,
          `dtSuspend` DATETIME DEFAULT NULL,
          UNIQUE INDEX User_name_unique (name),
          UNIQUE INDEX User_email_unique (email),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down()
    {
        DB::statement('DROP TABLE `User`');
    }
};
