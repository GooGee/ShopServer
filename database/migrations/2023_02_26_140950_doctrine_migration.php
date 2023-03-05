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
        DB::statement('ALTER TABLE Trend CHANGE amount `amount` BIGINT NOT NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE `Trend` CHANGE `amount` amount INT NOT NULL');
    }
};
