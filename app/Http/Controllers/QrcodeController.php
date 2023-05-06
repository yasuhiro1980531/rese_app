<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class QrcodeController extends Controller
{
    public function show($id)
    {
        $myShops = Shop::where('manager_id',Auth::id())->get();
        foreach($myShops as $myShop)
        $myShop_id = $myShop->id;
        $myReserves = Reserve::where('shop_id',$myShop->id)->get();
        foreach($myReserves as $myReserve)
        $myReserve_id = $myReserve->shop_id;
        $reserves = Reserve::find($id);
        return view('qrcode.index',compact('reserves','myShop_id','myReserve_id'));
    }
    
    
    public function find($id)
    {
        $reserve = Reserve::find($id);
        return view('qrcode.show',compact('reserve'));
    }

    public function add(Request $request)
    {
        $reserve_status = Reserve::where('id',$request->id)->first();
        $reserve_status->status = $request['status'];
        $reserve_status->save();
        return redirect()->route('mypage');
    }
}
