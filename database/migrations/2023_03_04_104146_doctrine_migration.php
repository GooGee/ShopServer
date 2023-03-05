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
        DB::statement('CREATE TABLE `ProductVoucher` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `productId` BIGINT NOT NULL,
          `voucherId` INT NOT NULL,
          INDEX IDX_8A0442BB37354C6E (`productId`),
          INDEX IDX_8A0442BB5A1B315B (`voucherId`),
          UNIQUE INDEX ProductVoucher_productId_voucherId_unique (productId, voucherId),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `ProductVoucher`
        ADD
          CONSTRAINT FK_8A0442BB37354C6E FOREIGN KEY (`productId`) REFERENCES `Product` (`id`)');
        DB::statement('ALTER TABLE
          `ProductVoucher`
        ADD
          CONSTRAINT FK_8A0442BB5A1B315B FOREIGN KEY (`voucherId`) REFERENCES `Voucher` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `ProductVoucher` DROP FOREIGN KEY FK_8A0442BB37354C6E');
        DB::statement('ALTER TABLE `ProductVoucher` DROP FOREIGN KEY FK_8A0442BB5A1B315B');
        DB::statement('DROP TABLE `ProductVoucher`');
    }
};
