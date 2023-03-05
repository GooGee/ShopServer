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
        DB::statement('CREATE TABLE `Post` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `text` VARCHAR(1222) NOT NULL,
          `reviewId` INT NOT NULL,
          `adminId` INT DEFAULT NULL,
          `userId` INT DEFAULT NULL,
          INDEX IDX_FAB8C3B340228BA5 (`reviewId`),
          INDEX IDX_FAB8C3B3110BADE5 (`adminId`),
          INDEX IDX_FAB8C3B325A316AF (`userId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `Post`
        ADD
          CONSTRAINT FK_FAB8C3B340228BA5 FOREIGN KEY (`reviewId`) REFERENCES `Review` (`id`)');
        DB::statement('ALTER TABLE
          `Post`
        ADD
          CONSTRAINT FK_FAB8C3B3110BADE5 FOREIGN KEY (`adminId`) REFERENCES `Admin` (`id`)');
        DB::statement('ALTER TABLE
          `Post`
        ADD
          CONSTRAINT FK_FAB8C3B325A316AF FOREIGN KEY (`userId`) REFERENCES `User` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Post` DROP FOREIGN KEY FK_FAB8C3B340228BA5');
        DB::statement('ALTER TABLE `Post` DROP FOREIGN KEY FK_FAB8C3B3110BADE5');
        DB::statement('ALTER TABLE `Post` DROP FOREIGN KEY FK_FAB8C3B325A316AF');
        DB::statement('DROP TABLE `Post`');
    }
};
