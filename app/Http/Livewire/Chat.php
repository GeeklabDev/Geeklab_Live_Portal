<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $group_id;
    public $message;
    public $messages=[];
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
        $this->messages = Message::where('group_id', $id)->orderBy('id','desc')->get();
    }
    public function send(){

        $messages = new Message();
        $messages->from_id = Auth::id();
        $messages->group_id = $this->group_id;
        $messages->message = $this->message;
        $messages->save();
        event(new \App\Events\Chat(Auth::id(),$this->message,$this->group_id));

        $this->reset('message');
        $this->selectedChat($this->group_id);
    }
}
