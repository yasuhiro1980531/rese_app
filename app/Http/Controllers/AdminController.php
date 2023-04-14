<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $genres = Genre::all();
        return view('admin.index',compact('shops','genres'));
    }

    public function show()
    {
        $genres = Genre::all();
        return view('admin.add',compact('genres'));
    }

    public function add(Request $request)
    {
        $img = $request->file('image_url');
        if(is_file($img)){
            $file_name = $request->image_url->getClientOriginalName();
            $img = $request->image_url->storeAs('public/shopImage',$file_name);
        }
        $newManager = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role']
        ]);

        Shop::create([
            'shop_name' => $request['shop_name'],
            'area' => $request['area'],
            'genre_id' => $request['genre_id'],
            'text' => $request['text'],
            'image_url' => $img,
            'manager_id' => $newManager->id
        ]);
        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $shops = Shop::find($id);
        $genres = Genre::all();
        return view('admin.edit',compact('shops','genres'));
    }

    public function update(AdminRequest $request)
    {
        $img = $request->file('image_url');
        if(is_file($img)){
            $file_name = $request->image_url->getClientOriginalName();
            $img = $request->image_url->storeAs('public/shopImage',$file_name);
        }
        Shop::where('id',$request->id)->update([
            'shop_name' => $request['shop_name'],
            'area' => $request['area'],
            'genre_id' => $request['genre_id'],
            'text' => $request['text'],
            'image_url' => $img
        ]);
        return redirect()->route('admin.index');
    }

    public function delete($id)
    {
        $shop = Shop::find($id);
        $shop->delete();
        return redirect()->route('admin.index');
    }
}
