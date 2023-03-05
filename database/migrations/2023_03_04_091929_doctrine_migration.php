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
        DB::statement('DROP INDEX Voucher_name_unique ON Voucher');
        DB::statement('CREATE UNIQUE INDEX Voucher_code_unique ON Voucher (code)');
    }

    public function down()
    {
        DB::statement('DROP INDEX Voucher_code_unique ON `Voucher`');
        DB::statement('CREATE UNIQUE INDEX Voucher_name_unique ON `Voucher` (name)');
    }
};
