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
        DB::statement('CREATE TABLE `Attribute` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `name` VARCHAR(111) NOT NULL,
          `categoryId` INT NOT NULL,
          INDEX IDX_788B6D58802EE3FF (`categoryId`),
          UNIQUE INDEX Attribute_categoryId_name_unique (categoryId, name),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('CREATE TABLE `AttributeValue` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          `text` VARCHAR(111) NOT NULL,
          `attributeId` INT NOT NULL,
          INDEX IDX_171FDB7B66DC11DF (`attributeId`),
          UNIQUE INDEX AttributeValue_attributeId_text_unique (attributeId, text),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `Attribute`
        ADD
          CONSTRAINT FK_788B6D58802EE3FF FOREIGN KEY (`categoryId`) REFERENCES `Category` (`id`)');
        DB::statement('ALTER TABLE
          `AttributeValue`
        ADD
          CONSTRAINT FK_171FDB7B66DC11DF FOREIGN KEY (`attributeId`) REFERENCES `Attribute` (`id`)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Attribute` DROP FOREIGN KEY FK_788B6D58802EE3FF');
        DB::statement('ALTER TABLE `AttributeValue` DROP FOREIGN KEY FK_171FDB7B66DC11DF');
        DB::statement('DROP TABLE `Attribute`');
        DB::statement('DROP TABLE `AttributeValue`');
    }
};
