<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupUsers;
use App\Models\Homework;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::where('user_id', Auth::id())->get();
        $ids = Group::where('user_id', Auth::id())->pluck('id')->toArray();
        $lessons = Lesson::with('group')->whereIn('group_id', $ids)->orderBy('id', 'desc')->get();
        return view('Teachers.Lesson.lesson', compact('groups', 'lessons'));
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
        $lesson = new Lesson();
        $lesson->title = $request->title;
        $lesson->content = $request->input('content');
        $lesson->group_id = $request->group_id;
        $lesson->save();

        return response()->json(['status' => 1, 'message' => 'Դասընթացը հաջողությամբ ավելացվել է', 'lesson' => $lesson]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)

    {
        $lesson = Lesson::find($id);
        $groups = Group::where('user_id', Auth::id())->get();
        return view('Teachers.Lesson.edit', compact('lesson', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Lesson::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->input('content'),
            'group_id' => $request->group_id,

        ]);
        return redirect('/lesson');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::where('id', $id)->delete();
        Homework::where('lesson_id',$id)->delete();
        return redirect()->back();
    }

    public function search($id)
    {
        $groups = Group::where('user_id', Auth::id())->get();
        $lessons = Lesson::where('group_id',$id)->with(['group'])->get();
        return view('.Teachers.Lesson.lesson', compact('groups', 'lessons'));
    }
}
