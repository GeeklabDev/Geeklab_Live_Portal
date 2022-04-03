<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Posts extends Component
{
    use WithFileUploads;
    public $comment;
    public $photo;
    public function render()
    {
        $posts = \App\Models\Post::with(['user', 'comments.user'])->orderBy('id','desc')->get();
        return view('livewire.posts')->with('posts', $posts);
    }
    public function like($id){
        $likes = new \App\Models\Like();
        $likes->user_id = Auth::id();
        $likes->post_id = $id;
        $likes->save();
    }
    function dislike($id){
        Like::where('user_id', Auth::id())->where('post_id', $id)->delete();
        return redirect()->back();
    }
    function addMessage($id){
//        $path = $this->photo->store('photos');
        $post = new Comment();
        $post->comment =$this->comment;
        $post->images =  '';
        $post->user_id = Auth::id();
        $post->post_id = $id;
        $post->save();

    }
}
