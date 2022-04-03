<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\GroupUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddStudent extends Component
{
    public $email;
    public $group_id;

    public function render()
    {
        $groups = Group::where('user_id', Auth::id())->get();
        $groupUsers = GroupUsers::with(['group','user'])->orderBy('id','desc')->get();
        return view('livewire.add-student')->with('groups', $groups)->with('groupUsers', $groupUsers);
    }
    public function save(){
        $email = $this->email;
        $user = User::where('email', $email)->first();
        $userId = $user['id'];

        $groupUser = new GroupUsers();
        $groupUser->user_id = $userId;
        $groupUser->group_id = $this->group_id;
        $groupUser->save();
        return redirect()->back();
    }
    public function delete($id){
        
    }
}
