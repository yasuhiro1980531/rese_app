<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Member;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area',
        'genre_id',
        'detail',
        'image_url'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
