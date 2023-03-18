<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'likes',
        'members_id'
    ];

    public function members()
    {
        return $this->belongsTo(Member::class);
    }
}
