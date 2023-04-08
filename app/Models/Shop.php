<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Like;
use App\Models\User;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area',
        'genre_id',
        'text',
        'image_url'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public static function doSearch($keyword,$genre_id,$area)
    {
        $query = self::query();
        if (!empty($keyword)) {
            $query->where('name', 'like binary', "%{$keyword}%");
        }
        if(!empty($genre_id)) {
            $query->where('genre_id', 'LIKE',$genre_id);
        }

        if(!empty($area)) {
            $query->where('area', 'LIKE',$area);
        }
        $results = $query->get();
        return $results;
    }
}
