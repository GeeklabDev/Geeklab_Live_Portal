<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Post extends Component
{
    use WithFileUploads;
    public $content;
    public $images=[];

    public function render()
    {
        $posts = \App\Models\Post::with(['user', 'comments.user'])->orderBy('id','desc')->get();
        return view('livewire.post')->with('posts', $posts);
    }
    function save(){

        $post = new \App\Models\Post();
        $post->content = $this->content;
        $post->images = '';
        $post->user_id = Auth::id();
        $post->save();

    }
}
