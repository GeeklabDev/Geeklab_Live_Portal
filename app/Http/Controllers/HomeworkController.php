<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    //
    function index(){
        return view('Teachers.Homeworks.homeworks');
    }
    function rating(Request $request, $id){
        Homework::where('id',$id)->update(['rating'=>$request->rating, 'message'=>$request->message]);
        return redirect()->back();
    }
}
