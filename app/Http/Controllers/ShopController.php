<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Member;
use App\Http\Requests\ReserveRequest;

class ShopController extends Controller
{

    public function index(Request $request)
    {
        $shops = Shop::all();
        $genres = Genre::all();
        $keyword = $request['keyword'];
        $genre_id = $request['genre'];
        $area = $request['area'];
        $query = Shop::query();
        $results = Shop::doSearch($keyword,$genre_id,$area);
        return view('shop.index',
                    ['shops' => $shops,
                    'genres' => $genres, 
                    'genre_id' => $genre_id,
                    'area' => $area,
                    'results' => $results
                    ]);
    }

    public function detail($id)
    {
        $shop = Shop::find($id);
        $members = Member::where('user_id',Auth::id())->where('shop_id',$shop->id)->get();
        if(empty($members)){
            $members = Member::create(['user_id' => Auth::id(),'shop_id' => $shop->id]);
        }
        return view('shop.detail',compact('shop','members'));
    }

    public function reserve(ReserveRequest $request)
    {
        $members_id = $request['members_id'];
        dd($members_id);
        $reserves = $request->all();
        //dd($reserves);
        Reserve::create($reserves);
        return view('shop.done',compact('reserves'));
    }

    public function mypage()
    {
        $user = Auth::user();
        $shops = Shop::all();

        return view('mypage',compact('user','shops'));
    }
}
