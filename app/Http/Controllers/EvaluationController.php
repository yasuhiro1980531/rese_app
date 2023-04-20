<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EvaluationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    public function add(EvaluationRequest $request)
    {
        
        $eva = $request->all();
        $check = Evaluation::where('user_id',$request['user_id'])->where('shop_id',$request['shop_id'])->first();
        $reserves = Reserve::all();
        foreach($reserves as $reserve)
        $reserve_id = $reserve->id;
        if($check == null){
            Evaluation::create($eva);
            $message = '評価の投稿ありがとうございました。';
        } else {
            $message = '同じ店を2度評価することはできません。';
        }
        return view('eva.thanks' ,compact('message','reserve_id'));
    }
}
