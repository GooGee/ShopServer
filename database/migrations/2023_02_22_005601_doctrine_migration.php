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
        DB::statement('CREATE TABLE `Admin` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `name` VARCHAR(33) NOT NULL,
          `email` VARCHAR(111) NOT NULL,
          `password` VARCHAR(111) NOT NULL,
          `remember_token` VARCHAR(111) DEFAULT NULL,
          UNIQUE INDEX Admin_name_unique (name),
          UNIQUE INDEX Admin_email_unique (email),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('CREATE TABLE `AdminSession` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `adminId` INT NOT NULL,
          INDEX IDX_A333E1CA110BADE5 (`adminId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `AdminSession`
        ADD
          CONSTRAINT FK_A333E1CA110BADE5 FOREIGN KEY (`adminId`) REFERENCES `Admin` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `AdminSession` DROP FOREIGN KEY FK_A333E1CA110BADE5');
        DB::statement('DROP TABLE `Admin`');
        DB::statement('DROP TABLE `AdminSession`');
    }
};
