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
        DB::statement('ALTER TABLE `Order` CHANGE sum `sum` BIGINT NOT NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Order` CHANGE `sum` sum INT NOT NULL');
    }
};
