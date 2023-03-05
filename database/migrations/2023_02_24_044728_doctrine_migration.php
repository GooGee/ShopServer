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
        DB::statement('CREATE TABLE `CartProduct` (
          `id` BIGINT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `amount` INT NOT NULL,
          `userId` INT NOT NULL,
          `productSkuId` BIGINT NOT NULL,
          INDEX IDX_6DDC373A25A316AF (`userId`),
          INDEX IDX_6DDC373AF96B5928 (`productSkuId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `CartProduct`
        ADD
          CONSTRAINT FK_6DDC373A25A316AF FOREIGN KEY (`userId`) REFERENCES `User` (`id`)');
        DB::statement('ALTER TABLE
          `CartProduct`
        ADD
          CONSTRAINT FK_6DDC373AF96B5928 FOREIGN KEY (`productSkuId`) REFERENCES `ProductSku` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `CartProduct` DROP FOREIGN KEY FK_6DDC373A25A316AF');
        DB::statement('ALTER TABLE `CartProduct` DROP FOREIGN KEY FK_6DDC373AF96B5928');
        DB::statement('DROP TABLE `CartProduct`');
    }
};
