<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('.Profiles.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::all();
        $file = $request->file('avatar');
        $name = time() . rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $request->file('avatar')->move("avatar", $name);
        $user->img = 'images/' . $name;


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('posts.comments.user',)->orderBy('id','desc')->find($id);
        return view('.Profiles.page', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('/Profiles/editProfile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string
     * @return integer
     */
    public function update(Request $request, $id)
    {
        $name = '';
        if ($request->hasFile('avatar')) {
            if ($request->file('avatar')->isValid()) {
                try {
                    $file = $request->file('avatar');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $request->file('avatar')->move("avatars", $name);
                    User::where('id', $id)->update([
                        'avatar' => 'avatars/' . $name,
                    ]);
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }
        User::where('id', $id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
        ]);
        return redirect('/profiles/student/' . $id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(){
        User::where('id',Auth::id())->update(['avatar'=>'']);
        return redirect()->back();

    }
}

