<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property \Illuminate\Support\Carbon|null $dtDelete
 * @property int $reviewId
 * @property int|null $adminId
 * @property int|null $userId
 * @property string $text
 *
 * @property Review review
 * @property Admin admin
 * @property User user
 */
class PostBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Post';

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
            'dtDelete',
            'reviewId',
            'adminId',
            'userId',
            'text',
        ];
    }



    public function review()
    {
        return $this->belongsTo(Review::class, 'reviewId');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'adminId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

}