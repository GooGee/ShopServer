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
        DB::statement('CREATE TABLE `Category` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `name` VARCHAR(33) NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `image` VARCHAR(111) NOT NULL,
          `parentId` INT DEFAULT NULL,
          INDEX IDX_FF3A7B97C76D74E (`parentId`),
          UNIQUE INDEX Category_parentId_name_unique (parentId, name),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `Category`
        ADD
          CONSTRAINT FK_FF3A7B97C76D74E FOREIGN KEY (`parentId`) REFERENCES `Category` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Category` DROP FOREIGN KEY FK_FF3A7B97C76D74E');
        DB::statement('DROP TABLE `Category`');
    }
};
