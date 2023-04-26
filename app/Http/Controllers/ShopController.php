<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Like;
use App\Models\User;
use App\Models\Evaluation;



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

    public function detail($id)
    {
        $shop = Shop::find($id);
        $evas = Evaluation::where('shop_id',$id)->get();
        $eva_first = Evaluation::where('shop_id',$id)->first();
        return view('shop.detail',compact('shop','evas','eva_first'));
    }

    public function mypage()
    {
        $user = Auth::user();
        $shops = Shop::all();
        
        if (auth()->user()->role === 'manager'){
            $myShops = Shop::where('manager_id',Auth::id())->get();
            $yourShop = Shop::where('manager_id',Auth::id())->first();
            
            if($yourShop == null){
                return $message = "担当店舗がありません。";}
            else{
                foreach($myShops as $myShop)
                $myReserves = Reserve::where('shop_id',$myShop->id)->get();
                $myReserve = Reserve::where('shop_id',$myShop->id)->first();
                }
            return view('mypage',compact('user','myShops','myReserves','myReserve','shops','yourShop'));
        }

        $date = new Carbon('-1 day');
        $likes = Like::where('user_id',Auth::id())->get();
        $reserves = Reserve::where('user_id',Auth::id())->get();
        $reserve = Reserve::where('user_id',Auth::id())->first();
        return view('mypage',compact('user','shops','likes','reserves','reserve','date'));
    }
}
