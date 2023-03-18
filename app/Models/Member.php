<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserve;
use App\Models\Like;
use App\Models\User;
use App\Models\Shop;


class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id'
    ];

     public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

     public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
}
