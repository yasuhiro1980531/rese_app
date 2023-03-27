<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Member;
use App\Http\Requests\ReserveRequest;

class ShopController extends Controller
{
    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }

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
        return view('shop.detail',compact('shop'));
    }

    public function reserve(ReserveRequest $request)
    {
        $reserves = $request->all();
        dd($reserves);
        Reserve::create($reserves);
        return view('shop.done',['reserves'=> $reserves]);
    }

    public function mypage()
    {
        return view('mypage');
    }
}
