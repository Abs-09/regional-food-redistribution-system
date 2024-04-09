<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    //RELATIONS =======
    public function donator(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'donator_id');
    }

    public function distributor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'distributor_id');
    }
}
