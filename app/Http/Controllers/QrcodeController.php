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
        $myReserves = Reserve::where('shop_id',$myShop_id)->first();
        $reserves = Reserve::find($id);
        return view('qrcode.index',compact('reserves','myReserves'));
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
