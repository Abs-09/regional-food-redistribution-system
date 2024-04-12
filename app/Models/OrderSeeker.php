<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderSeeker extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    //Relations ============================================
    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'seeker_id', 'id');
    }

    public function order() : BelongsTo {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
