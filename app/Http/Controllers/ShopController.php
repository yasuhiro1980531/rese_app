<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Like;
use App\Models\User;
use App\Http\Requests\ReserveRequest;

class ShopController extends Controller
{

    public function index(Request $request)
    {
        $shops = Shop::all();
        $genres = Genre::all();
        $user_id = Auth::id();
        $likes = Like::all();
        $keyword = $request['keyword'];
        $genre_id = $request['genre'];
        $area = $request['area'];
        $query = Shop::query();
        $results = Shop::doSearch($keyword,$genre_id,$area);
        return view('shop.index',compact('shops','genres','user_id','genre_id','area','results','likes'));
    }

    public function menu(){
        return view('shop.menu');
    }

    public function detail($id)
    {
        $shop = Shop::find($id);
        return view('shop.detail',compact('shop'));
    }

    public function reserve(ReserveRequest $request)
    {
        $reserveInfo = $request->all();
        Reserve::create($reserveInfo);
        return view('shop.done',compact('reserveInfo'));
    }

    public function mypage()
    {
        $user = Auth::user();
        $likes = Like::where('user_id',Auth::id())->get();
        $reserves = Reserve::where('user_id',Auth::id())->get();
        return view('mypage',compact('user','likes','reserves'));
    }

    public function delete($id)
    {
        $reserve = Reserve::find($id);
        $reserve->delete();
        return redirect()->route('mypage');
    }
}
