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
        DB::statement('CREATE TABLE `Address` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `zip` INT NOT NULL,
          `name` VARCHAR(111) NOT NULL,
          `phone` VARCHAR(33) NOT NULL,
          `text` VARCHAR(111) NOT NULL,
          `countryId` INT NOT NULL,
          `userId` INT NOT NULL,
          INDEX IDX_C2F3561D8B9E1444 (`countryId`),
          INDEX IDX_C2F3561D25A316AF (`userId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `Address`
        ADD
          CONSTRAINT FK_C2F3561D8B9E1444 FOREIGN KEY (`countryId`) REFERENCES `Country` (`id`)');
        DB::statement('ALTER TABLE
          `Address`
        ADD
          CONSTRAINT FK_C2F3561D25A316AF FOREIGN KEY (`userId`) REFERENCES `User` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Address` DROP FOREIGN KEY FK_C2F3561D8B9E1444');
        DB::statement('ALTER TABLE `Address` DROP FOREIGN KEY FK_C2F3561D25A316AF');
        DB::statement('DROP TABLE `Address`');
    }
};
