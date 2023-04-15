<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    public function index($id)
    {
        $user_id = Auth::id();
        $shop = Shop::where('id',$id)->first();
        return view('eva.index',compact('user_id','shop'));
    }

    public function add(Request $request)
    {
        
        $eva = $request->all();
        $check = Evaluation::where('user_id',$request['user_id'])->where('shop_id',$request['shop_id'])->first();
        if($check == null){
            Evaluation::create($eva);
            $message = '評価の投稿ありがとうございました。';
        } else {
            $message = '同じ店を2度評価することはできません。';
        }
        return view('eva.thanks' ,compact('message'));
    }
}
