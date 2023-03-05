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
        DB::statement('CREATE TABLE `model_has_permissions` (
          `model_type` VARCHAR(111) NOT NULL,
          `model_id` INT UNSIGNED NOT NULL,
          `id` INT AUTO_INCREMENT NOT NULL,
          `permission_id` INT UNSIGNED NOT NULL,
          INDEX IDX_6B22422AA0A943B4 (`permission_id`),
          UNIQUE INDEX ModelHasPermission_model_id_model_type_permission_id_unique (
            model_id, model_type, permission_id
          ),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('CREATE TABLE `model_has_roles` (
          `model_type` VARCHAR(111) NOT NULL,
          `model_id` INT UNSIGNED NOT NULL,
          `id` INT AUTO_INCREMENT NOT NULL,
          `role_id` INT UNSIGNED NOT NULL,
          INDEX IDX_747E57EA9F4E2857 (`role_id`),
          UNIQUE INDEX ModelHasRole_model_id_model_type_role_id_unique (model_id, model_type, role_id),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('CREATE TABLE `permissions` (
          `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
          `name` VARCHAR(111) NOT NULL,
          `guard_name` VARCHAR(111) NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          UNIQUE INDEX Permission_name_guard_name_unique (name, guard_name),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('CREATE TABLE `role_has_permissions` (
          `id` INT AUTO_INCREMENT NOT NULL,
          `permission_id` INT UNSIGNED NOT NULL,
          `role_id` INT UNSIGNED NOT NULL,
          INDEX IDX_8BDE50C2A0A943B4 (`permission_id`),
          INDEX IDX_8BDE50C29F4E2857 (`role_id`),
          UNIQUE INDEX RoleHasPermission_permission_id_role_id_unique (permission_id, role_id),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('CREATE TABLE `roles` (
          `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
          `name` VARCHAR(111) NOT NULL,
          `guard_name` VARCHAR(111) NOT NULL,
          `dtCreate` DATETIME NOT NULL,
          `dtUpdate` DATETIME NOT NULL,
          `dtDelete` DATETIME DEFAULT NULL,
          UNIQUE INDEX Role_name_guard_name_unique (name, guard_name),
          PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        DB::statement('ALTER TABLE
          `model_has_permissions`
        ADD
          CONSTRAINT FK_6B22422AA0A943B4 FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)');
        DB::statement('ALTER TABLE
          `model_has_roles`
        ADD
          CONSTRAINT FK_747E57EA9F4E2857 FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)');
        DB::statement('ALTER TABLE
          `role_has_permissions`
        ADD
          CONSTRAINT FK_8BDE50C2A0A943B4 FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)');
        DB::statement('ALTER TABLE
          `role_has_permissions`
        ADD
          CONSTRAINT FK_8BDE50C29F4E2857 FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)');
        DB::statement('DROP TABLE users');
        DB::statement('DROP TABLE password_resets');
    }

    public function down()
    {
        DB::statement('CREATE TABLE users (
          id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
          name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`,
          email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`,
          email_verified_at DATETIME DEFAULT NULL,
          password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`,
          remember_token VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`,
          created_at DATETIME DEFAULT NULL,
          updated_at DATETIME DEFAULT NULL,
          UNIQUE INDEX users_email_unique (email),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\'');
        DB::statement('CREATE TABLE password_resets (
          email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`,
          token VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`,
          created_at DATETIME DEFAULT NULL,
          PRIMARY KEY(email)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\'');
        DB::statement('ALTER TABLE `model_has_permissions` DROP FOREIGN KEY FK_6B22422AA0A943B4');
        DB::statement('ALTER TABLE `model_has_roles` DROP FOREIGN KEY FK_747E57EA9F4E2857');
        DB::statement('ALTER TABLE `role_has_permissions` DROP FOREIGN KEY FK_8BDE50C2A0A943B4');
        DB::statement('ALTER TABLE `role_has_permissions` DROP FOREIGN KEY FK_8BDE50C29F4E2857');
        DB::statement('DROP TABLE `model_has_permissions`');
        DB::statement('DROP TABLE `model_has_roles`');
        DB::statement('DROP TABLE `permissions`');
        DB::statement('DROP TABLE `role_has_permissions`');
        DB::statement('DROP TABLE `roles`');
    }
};
