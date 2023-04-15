<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::all(); 
        $reserves = Reserve::where('user_id',Auth::id())->get();
        return view('manager.index',compact('user','shops','reserves'));
    }

    public function edit($id)
    {
        $shops = Shop::find($id);
        $genres = Genre::all();
        return view('manager.edit',compact('shops','genres'));
    }

    public function update(AdminRequest $request)
    {
        $img = $request->file('image_url');
        if(is_file($img)){
            $file_name = $request->image_url->getClientOriginalName();
            $img = $request->image_url->storeAs('public/shopImage',$file_name);
        }
        
        $new_shop = Shop::where('id',$request->id)->first();
        $new_shop->shop_name = $request['shop_name'];
        $new_shop->area = $request['area'];
        $new_shop->genre_id = $request['genre_id'];
        $new_shop->text = $request['text'];
        
        if($img !== null){
            $new_shop->image_url = $img;
        }

        $new_shop->save();
            
        return redirect()->route('mypage');
    }
}
