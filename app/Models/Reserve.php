<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'members_id',
        'reserve_date',
        'reserve_time',
        'reserve_num'
    ];

    public function members()
    {
        return $this->belongsTo(Member::class);
    }
}
