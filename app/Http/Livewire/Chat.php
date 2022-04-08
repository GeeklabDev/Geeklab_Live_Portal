<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $group_id;
    public $message;
    public $messages=[];
    public $audio;
    public function render()
    {
        $groups =  \App\Models\Group::all();
        $messages = $this->messages;
            $testId = \App\Models\Group::where('user_id', Auth::id())->first()['id'];
            $this->selectedChat($testId);
        return view('livewire.chat', ['groups'=>$groups, 'messages'=>$messages]);
    }
    public function selectedChat($id){
        $this->group_id=$id;
        $this->messages = Message::where('group_id', $id)->orderBy('id','asc')->get();
    }
    public function send(){

        $messages = new Message();
        $messages->from_id = Auth::id();
        $messages->group_id = $this->group_id;
        $messages->message = $this->message;
        $messages->save();

        $this->reset('message');
        $this->selectedChat($this->group_id);
    }
}
