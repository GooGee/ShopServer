<?php

declare(strict_types=1);

namespace App\Service\Setup;

use App\Models\Address;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\CartProduct;
use App\Models\FileInfo;
use App\Models\Notification;
use App\Models\Operation;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Page;
use App\Models\Post;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Trend;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class AlterTable
{
    const MinId = 1222;

    function run()
    {
        $tablezz = [
            Address::getClassName(),
            Attribute::getClassName(),
            AttributeValue::getClassName(),
            CartProduct::getClassName(),
            FileInfo::getClassName(),
            Notification::getClassName(),
            Operation::getClassName(),
            Order::getClassName(),
            OrderProduct::getClassName(),
            Page::getClassName(),
            Post::getClassName(),
            Review::getClassName(),
            Setting::getClassName(),
            Tag::getClassName(),
            Trend::getClassName(),
            User::getClassName(),
            Voucher::getClassName(),

            'model_has_permissions',
            'model_has_roles',
            'permissions',
            'role_has_permissions',
            'roles',
        ];

        foreach ($tablezz as $table) {
            $found = DB::query()->from($table)->find(self::MinId);
            if ($found === null) {
                DB::statement("ALTER TABLE `$table` AUTO_INCREMENT=" . self::MinId);
            }
        }
    }
}