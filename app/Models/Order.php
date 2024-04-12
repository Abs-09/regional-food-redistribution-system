<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;
use Ramsey\Uuid\Type\Integer;

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

    public function seekers(): HasMany
    {
        return $this->hasMany(OrderSeeker::class, 'order_id', 'id');
    }

    //FUNCTIONS ===============================

    public function platesRemaining() : int {
        return $this->number_of_plates - $this->seekers()->count();
    }

    public function hasSeeker($seeker_id) : bool {
        return $this->seekers()->where('seeker_id', $seeker_id)->get()->isNotEmpty();
    }
}
