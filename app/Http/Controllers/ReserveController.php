<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;

class ReserveController extends Controller
{
    public function reserve(ReserveRequest $request)
    {
        $reserveInfo = $request->all();
        Reserve::create($reserveInfo);
        return view('reserve.done',compact('reserveInfo'));
    }
    
    public function edit($id)
    {
        $reserves = Reserve::find($id);
        $shops = Shop::all();
        return view('reserve.edit',compact('reserves','shops'));
    }

    public function update(ReserveRequest $request)
    {
        $reserveEdit = $request->except('_token');
        Reserve::where('id',$request->id)->update($reserveEdit);
        return redirect()->route('mypage');
    }

    public function delete($id)
    {
        $reserve = Reserve::find($id);
        $reserve->delete();
        return redirect()->route('mypage');
    }
}
