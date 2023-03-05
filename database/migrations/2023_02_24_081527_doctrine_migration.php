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
        DB::statement('CREATE TABLE `Order` (
          `id` BIGINT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `sum` INT NOT NULL,
          `dtCancel` DATETIME DEFAULT NULL,
          `dtExpire` DATETIME DEFAULT NULL,
          `dtFulfill` DATETIME DEFAULT NULL,
          `dtPay` DATETIME DEFAULT NULL,
          `dtReceive` DATETIME DEFAULT NULL,
          `dtRefund` DATETIME DEFAULT NULL,
          `dtReturn` DATETIME DEFAULT NULL,
          `status` VARCHAR(111) NOT NULL,
          `statusPayment` VARCHAR(111) NOT NULL,
          `userId` INT NOT NULL,
          `addressId` INT NOT NULL,
          INDEX IDX_34E8BC9C25A316AF (`userId`),
          INDEX IDX_34E8BC9C87068541 (`addressId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('CREATE TABLE `OrderProduct` (
          `id` BIGINT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `amount` INT NOT NULL,
          `price` BIGINT NOT NULL,
          `orderId` BIGINT NOT NULL,
          `productSkuId` BIGINT NOT NULL,
          INDEX IDX_3E7A119FF8BF42CD (`orderId`),
          INDEX IDX_3E7A119FF96B5928 (`productSkuId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `Order`
        ADD
          CONSTRAINT FK_34E8BC9C25A316AF FOREIGN KEY (`userId`) REFERENCES `User` (`id`)');
        DB::statement('ALTER TABLE
          `Order`
        ADD
          CONSTRAINT FK_34E8BC9C87068541 FOREIGN KEY (`addressId`) REFERENCES `Address` (`id`)');
        DB::statement('ALTER TABLE
          `OrderProduct`
        ADD
          CONSTRAINT FK_3E7A119FF8BF42CD FOREIGN KEY (`orderId`) REFERENCES `Order` (`id`)');
        DB::statement('ALTER TABLE
          `OrderProduct`
        ADD
          CONSTRAINT FK_3E7A119FF96B5928 FOREIGN KEY (`productSkuId`) REFERENCES `ProductSku` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Order` DROP FOREIGN KEY FK_34E8BC9C25A316AF');
        DB::statement('ALTER TABLE `Order` DROP FOREIGN KEY FK_34E8BC9C87068541');
        DB::statement('ALTER TABLE `OrderProduct` DROP FOREIGN KEY FK_3E7A119FF8BF42CD');
        DB::statement('ALTER TABLE `OrderProduct` DROP FOREIGN KEY FK_3E7A119FF96B5928');
        DB::statement('DROP TABLE `Order`');
        DB::statement('DROP TABLE `OrderProduct`');
    }
};
