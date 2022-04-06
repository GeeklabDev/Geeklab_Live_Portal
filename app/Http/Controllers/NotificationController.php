<?php

namespace App\Http\Controllers;

use App\Models\Nitification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    function store(Request $request, $id){
        $notification = new Nitification();
        $notification->from_id = Auth::id();
        $notification->to_id = $id;
        $notification->message = $request->message;
        $notification->save();
        return redirect()->back();
    }
}
