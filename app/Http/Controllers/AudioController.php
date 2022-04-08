<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AudioController extends Controller
{
    function recorder(Request $request){
        $file = $request->file('audio_data');
        $name = time() . rand(11111, 99999) . '.' . "wav";
        $request->file('audio_data')->move("audios", $name);
        $audio= 'audios/' . $name;
        $messages = new Message();
        $messages->from_id = Auth::id();
        $messages->group_id = $request->group_id;
        $messages->message='';
        $messages->audio=$audio;
        $messages->save();

        return $audio;
//        $size = $_FILES['audio_data']['size']; //the size in bytes
//        $input = $_FILES['audio_data']['tmp_name']; //temporary name that PHP gave to the uploaded file
//        $output = $_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea
//
////move the file from temp name to local folder using $output name
//        move_uploaded_file('/audios', $output);


    }
}
