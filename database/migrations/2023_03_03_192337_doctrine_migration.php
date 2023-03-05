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
        DB::statement('CREATE TABLE `Voucher` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `type` VARCHAR(111) NOT NULL,
          `amount` INT NOT NULL,
          `limit` INT NOT NULL,
          `code` VARCHAR(111) NOT NULL,
          `dtStart` DATETIME DEFAULT NULL,
          `dtEnd` DATETIME DEFAULT NULL,
          `name` VARCHAR(111) NOT NULL,
          UNIQUE INDEX Voucher_name_unique (name),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down()
    {
        DB::statement('DROP TABLE `Voucher`');
    }
};
