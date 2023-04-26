<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Shop;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'reserve_date',
        'reserve_time',
        'reserve_num',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
