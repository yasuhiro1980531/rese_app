<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Like;

class LikeController extends Controller
{
    public function likes(Shop $shop)
    {
        Like::create([
            'user_id' => Auth::id(),
            'shop_id' => $shop->id
        ]);
        return redirect()->route('shop.index');
    }

    public function unlikes(Shop $shop)
    {
        $user_id = Auth::id();
        $like = Like::where('shop_id',$shop->id)->where('user_id',$user_id)->first();
        $like->delete();
        return redirect()->route('shop.index');
    }
}
