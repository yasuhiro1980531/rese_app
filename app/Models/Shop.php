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
