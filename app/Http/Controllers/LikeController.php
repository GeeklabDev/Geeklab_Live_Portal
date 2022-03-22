<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    function add($id){
        $likes = new Like();
        $likes->user_id = Auth::id();
        $likes->post_id = $id;
        $likes->save();
        return redirect()->back();
    }
    function dislike($id){
       Like::where('user_id', Auth::id())->where('post_id', $id)->delete();
       return redirect()->back();
    }
}
