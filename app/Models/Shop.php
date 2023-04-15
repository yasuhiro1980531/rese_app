<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Like;
use App\Models\User;
use App\Models\Evaluation;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'area',
        'genre_id',
        'text',
        'image_url',
        'manager_id'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
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
