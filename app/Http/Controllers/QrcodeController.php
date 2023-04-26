<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;

class QrcodeController extends Controller
{
    public function show($id)
    {
        $reserves = Reserve::find($id);
        return view('qrcode.index',compact('reserves'));
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
        //dd($reserve_status->status);
        $reserve_status->save();
        return redirect()->route('mypage');
    }
}
