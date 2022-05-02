<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupUsers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupsUsers = Group::with('user', 'users.user')->get();
        return view('Teachers.Users.users', compact('groupsUsers'));
    }
    function store(Request  $request, $id){
        $email = $request->email;
        $user = User::where('email', $email)->first();
        $userId = $user['id'];

        $groupUser = new GroupUsers();
        $groupUser->user_id = $userId;
        $groupUser->group_id =$id;
        $groupUser->save();
        return redirect()->back();
    }

}
