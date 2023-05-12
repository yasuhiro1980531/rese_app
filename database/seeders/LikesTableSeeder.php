<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $param = [
        'user_id' => 1,
        'shop_id' => 3,
    ];
    Like::create($param);
    $param = [
        'user_id' => 1,
        'shop_id' => 7,
    ];
    Like::create($param);
    }
}
