<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Group extends Component
{
    public $name;
    public $updatedName;

    public function render()
    {
        $group = \App\Models\Group::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('livewire.group')->with('group', $group);
    }
    function save(){
        $group = new \App\Models\Group();
        $group->name = $this->name;
        $group->user_id = Auth::id();
        $group->save();
    }
    function delete($id){
        \App\Models\Group::where('id', $id)->delete();
        Lesson::where('group_id', $id)->delete();
    }
    function update()
    {
//        echo 'pk';
        dd($this->updatedName);
    }
    function edit($id){
        $group = \App\Models\Group::find($id);
        $updatedName = $group['name'];
        $this->updatedName=$updatedName;
    }
}
