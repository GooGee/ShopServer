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
        DB::statement('CREATE TABLE `Product` (
          `id` BIGINT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `name` VARCHAR(333) NOT NULL,
          `price` INT NOT NULL,
          `stock` INT NOT NULL,
          `discount` INT NOT NULL,
          `image` VARCHAR(111) NOT NULL,
          `imagezz` VARCHAR(1222) NOT NULL,
          `aaLiked` INT DEFAULT 0 NOT NULL,
          `aaSold` INT DEFAULT 0 NOT NULL,
          `rating` DOUBLE PRECISION DEFAULT \'0\' NOT NULL,
          `ratingzz` VARCHAR(255) DEFAULT \'[0,0,0,0,0,0]\' NOT NULL,
          `dtPublish` DATETIME DEFAULT NULL,
          `detail` LONGTEXT NOT NULL,
          `shopId` INT NOT NULL,
          `categoryId` INT NOT NULL,
          INDEX IDX_1CF73D31802EE3FF (`categoryId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('CREATE TABLE `ProductSku` (
          `id` BIGINT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `price` INT NOT NULL,
          `stock` INT NOT NULL,
          `variationzz` VARCHAR(1222) NOT NULL,
          `productId` BIGINT NOT NULL,
          INDEX IDX_420BF02637354C6E (`productId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `Product`
        ADD
          CONSTRAINT FK_1CF73D31802EE3FF FOREIGN KEY (`categoryId`) REFERENCES `Category` (`id`)');
        DB::statement('ALTER TABLE
          `ProductSku`
        ADD
          CONSTRAINT FK_420BF02637354C6E FOREIGN KEY (`productId`) REFERENCES `Product` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Product` DROP FOREIGN KEY FK_1CF73D31802EE3FF');
        DB::statement('ALTER TABLE `ProductSku` DROP FOREIGN KEY FK_420BF02637354C6E');
        DB::statement('DROP TABLE `Product`');
        DB::statement('DROP TABLE `ProductSku`');
    }
};
