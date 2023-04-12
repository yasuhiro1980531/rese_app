<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Models\Genre;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.index');
    }

    public function edit()
    {
        return view('manager.edit');
    }

    public function update()
    {
        return view('manager.index');
    }
}
