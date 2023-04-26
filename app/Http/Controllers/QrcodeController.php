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
}
