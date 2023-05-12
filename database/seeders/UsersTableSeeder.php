<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $param = [
        'name' => 'test',
        'email' => 'test@test123',
        'password' => Hash::make('password'),
        'role' => 'user'
    ];
    user::create($param);
    $param = [
        'name' => '管理者',
        'email' => 'admin@admin.com',
        'password' => Hash::make('adminpass'),
        'role' => 'administrator'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou1',
        'email' => 'tentyou1@tentyou.com',
        'password' => Hash::make('tentyou1'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou2',
        'email' => 'tentyou2@tentyou.com',
        'password' => Hash::make('tentyou2'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou3',
        'email' => 'tentyou3@tentyou.com',
        'password' => Hash::make('tentyou3'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou4',
        'email' => 'tentyou4@tentyou.com',
        'password' => Hash::make('tentyou4'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou5',
        'email' => 'tentyou5@tentyou.com',
        'password' => Hash::make('tentyou5'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou6',
        'email' => 'tentyou6@tentyou.com',
        'password' => Hash::make('tentyou6'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou7',
        'email' => 'tentyou7@tentyou.com',
        'password' => Hash::make('tentyou7'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou8',
        'email' => 'tentyou8@tentyou.com',
        'password' => Hash::make('tentyou8'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou9',
        'email' => 'tentyou9@tentyou.com',
        'password' => Hash::make('tentyou9'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou10',
        'email' => 'tentyou10@tentyou.com',
        'password' => Hash::make('tentyou10'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou11',
        'email' => 'tentyou11@tentyou.com',
        'password' => Hash::make('tentyou11'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou12',
        'email' => 'tentyou12@tentyou.com',
        'password' => Hash::make('tentyou12'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou13',
        'email' => 'tentyou13@tentyou.com',
        'password' => Hash::make('tentyou13'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou14',
        'email' => 'tentyou14@tentyou.com',
        'password' => Hash::make('tentyou14'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou15',
        'email' => 'tentyou15@tentyou.com',
        'password' => Hash::make('tentyou15'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou16',
        'email' => 'tentyou16@tentyou.com',
        'password' => Hash::make('tentyou16'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou17',
        'email' => 'tentyou17@tentyou.com',
        'password' => Hash::make('tentyou17'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou18',
        'email' => 'tentyou18@tentyou.com',
        'password' => Hash::make('tentyou18'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou19',
        'email' => 'tentyou19@tentyou.com',
        'password' => Hash::make('tentyou19'),
        'role' => 'manager'
    ];
    user::create($param);
    $param = [
        'name' => 'tentyou20',
        'email' => 'tentyou20@tentyou.com',
        'password' => Hash::make('tentyou20'),
        'role' => 'manager'
    ];
    user::create($param);
    }
}
