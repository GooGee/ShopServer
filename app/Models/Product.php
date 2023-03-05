<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends ProductBase
{
    const Detail = '----';

    public function voucherzz(): BelongsToMany
    {
        return parent::voucherzz()->withPivot(['id']);
    }

}