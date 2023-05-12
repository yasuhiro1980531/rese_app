<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evaluation;

class EvaluationsTableSeeder extends Seeder
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
        'shop_id' => 19,
        'level' => 5,
        'comment' =>'test',
    ];
    Evaluation::create($param);
    $param = [
        'user_id' => 1,
        'shop_id' => 17,
        'level' => 3,
        'comment' => 'とっても満足しました。また行きたいです。'
    ];
    Evaluation::create($param);
    }
}