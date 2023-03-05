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
        DB::statement('CREATE TABLE `Operation` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `name` VARCHAR(111) NOT NULL,
          `text` VARCHAR(111) NOT NULL,
          `adminId` INT NOT NULL,
          INDEX IDX_9B7024CE110BADE5 (`adminId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `Operation`
        ADD
          CONSTRAINT FK_9B7024CE110BADE5 FOREIGN KEY (`adminId`) REFERENCES `Admin` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Operation` DROP FOREIGN KEY FK_9B7024CE110BADE5');
        DB::statement('DROP TABLE `Operation`');
    }
};
