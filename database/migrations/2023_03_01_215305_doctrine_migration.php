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
        DB::statement('ALTER TABLE Review ADD `soi` BIGINT NOT NULL');
        DB::statement('CREATE UNIQUE INDEX Review_soi_unique ON Review (soi)');
    }

    public function down()
    {
        DB::statement('DROP INDEX Review_soi_unique ON `Review`');
        DB::statement('ALTER TABLE `Review` DROP `soi`');
    }
};
