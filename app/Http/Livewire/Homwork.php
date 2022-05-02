<?php

namespace App\Http\Livewire;

use App\Models\Homework;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Homwork extends Component
{
    public $homework;
    use WithFileUploads;
    public $ids;
    public function render()
    {
        $homeworks = Homework::where('user_id', Auth::id())->where('lesson_id', $this->ids)->get();
        return view('livewire.homwork')->with('homeworks', $homeworks);
    }
    public function add_homework(){
        $path = $this->homework->store('homeworks');

        $homework = new Homework();
        $homework->user_id = Auth::id();
        $homework->lesson_id = $this->ids;
        $homework->homework = $path;
        $homework->message = '';
        $homework->rating = 0;
        $homework->save();
    }
    function downloadHomework($link){
        return Storage::download($link);
    }
}
