<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserve;

class ReservesTableSeeder extends Seeder
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
        'shop_id' => 10,
        'reserve_date' => date('2023-5-12'),
        'reserve_time' => date('18:00:00'),
        'reserve_num' =>2,
    ];
    Reserve::create($param);
    $param = [
        'user_id' => 1,
        'shop_id' => 3,
        'reserve_date' => date('2023-5-11'),
        'reserve_time' => date('19:00:00'),
        'reserve_num' =>3,
        'status' => 'came'
    ];
    Reserve::create($param);
    }
}
