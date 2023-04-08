<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Genre;
use Illuminate\Http\Request;
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
        return view('admin.add');
    }

    public function add(Request $request)
    {
        //dd($request['image_url']);
        $file_name = $request->image_url->getClientOriginalName();
        $img = $request->image_url->storeAs('storage/shopImage',$file_name);
        Shop::create([
            'name' => $request['name'],
            'area' => $request['area'],
            'genre_id' => $request['genre_id'],
            'text' => $request['text'],
            'image_url' => $img
        ]);
        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $shops = Shop::find($id);
        return view('admin.edit',compact('shops'));
    }

    public function update(AdminRequest $request)
    {
        $file_name = $request->image_url->getClientOriginalName();
        $img = $request->image_url->storeAs('storage/shopImage',$file_name);
        Shop::where('id',$request->id)->update([
            'name' => $request['name'],
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
