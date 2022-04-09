<?php

namespace App\Http\Controllers;

use App\Models\Employments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class teacherController extends Controller
{
    //
    function makeTeacher($id){
        $arr = [
            ['weekdays'=>1, 'hours'=>'9:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'10:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'11:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'12:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'13:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'14:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'15:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'16:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'17:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'18:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'19:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'20:00', 'teacher_id'=>Auth::id()],
            ['weekdays'=>1, 'hours'=>'21:00', 'teacher_id'=>Auth::id()],
        ];
        User::where('id', Auth::id())->update(['teachers'=>1]);
        if(count(Employments::all()->where('teacher_id',$id))<=0){
            for($j=1; $j<=7; $j++){
                for($i=0; $i<count($arr); $i++){
                    $model = new Employments();
                    $model->weekdays=$j;
                    $model->hours = $arr[$i]['hours'];
                    $model->teacher_id =$id;
                    $model->employ =0;
                    $model->save();
                }
            }
        }
    }
}
