<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Book extends Component
{
    use WithFileUploads;
    public $file;
    public function render()
    {
        $books = \App\Models\Book::all()->where('user_id', Auth::id());
        return view('livewire.book')->with('books', $books);
    }
    public function save(){
        $files = $this->file->store('files');
        $book = new \App\Models\Book();
        $book->user_id = Auth::id();
        $book->file = $files;
        $book->save();
        return 1;
    }
    public function delete($id){
        $file = \App\Models\Book::find($id)['file'];
        unlink(storage_path('app/'.$file));

        \App\Models\Book::where('id',$id)->delete();
        return 1;
    }
}
