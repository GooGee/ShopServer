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
        DB::statement('CREATE TABLE `Review` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `text` VARCHAR(1222) NOT NULL,
          `rating` INT NOT NULL,
          `userId` INT NOT NULL,
          `productId` BIGINT NOT NULL,
          INDEX IDX_7EEF84F025A316AF (`userId`),
          INDEX IDX_7EEF84F037354C6E (`productId`),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `Review`
        ADD
          CONSTRAINT FK_7EEF84F025A316AF FOREIGN KEY (`userId`) REFERENCES `User` (`id`)');
        DB::statement('ALTER TABLE
          `Review`
        ADD
          CONSTRAINT FK_7EEF84F037354C6E FOREIGN KEY (`productId`) REFERENCES `Product` (`id`)');
        DB::statement('ALTER TABLE CartProduct RENAME INDEX idx_6ddc373af96b5928 TO IDX_6DDC373AC3C59310');
        DB::statement('ALTER TABLE OrderProduct RENAME INDEX idx_3e7a119ff96b5928 TO IDX_3E7A119FC3C59310');
        DB::statement('ALTER TABLE ProductSku RENAME INDEX idx_420bf02637354c6e TO IDX_5B45DE9E37354C6E');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Review` DROP FOREIGN KEY FK_7EEF84F025A316AF');
        DB::statement('ALTER TABLE `Review` DROP FOREIGN KEY FK_7EEF84F037354C6E');
        DB::statement('DROP TABLE `Review`');
        DB::statement('ALTER TABLE `CartProduct` RENAME INDEX idx_6ddc373ac3c59310 TO IDX_6DDC373AF96B5928');
        DB::statement('ALTER TABLE `OrderProduct` RENAME INDEX idx_3e7a119fc3c59310 TO IDX_3E7A119FF96B5928');
        DB::statement('ALTER TABLE `ProductSku` RENAME INDEX idx_5b45de9e37354c6e TO IDX_420BF02637354C6E');
    }
};
