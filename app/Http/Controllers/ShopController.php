<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }

    public function index()
    {
        $shops = Shop::all();
        //dd($shops);
        return view('shop.index',['shops' => $shops]);
    }

    public function detail($id)
    {
        $shop = Shop::find($id);
        return view('shop.detail',compact('shop'));
    }
}
