<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property string $name
 * @property int|null $parentId
 * @property \Illuminate\Support\Carbon|null $dtDelete
 * @property string $image
 *
 * @property Category $parent
 * @property Product[] $productzz
 * @property Attribute[] $attributezz
 */
class CategoryBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Category';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

        'dtCreate' => 'datetime',
        'dtUpdate' => 'datetime',
        'dtDelete' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    static function keyzz(): array
    {
        return [

            'id',
            'dtCreate',
            'dtUpdate',
            'name',
            'parentId',
            'dtDelete',
            'image',
        ];
    }



    public function parent()
    {
        return $this->belongsTo(Category::class, 'parentId');
    }

    public function productzz()
    {
        return $this->hasMany(Product::class, 'categoryId');
    }

    public function attributezz()
    {
        return $this->hasMany(Attribute::class, 'categoryId');
    }

}