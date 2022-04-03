<?php

namespace App\Http\Livewire;

use App\Models\Homework;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Homwork extends Component
{
    public $homework;
    use WithFileUploads;
    public $ids;
    public function render()
    {
        return view('livewire.homwork');
    }
    public function add_homework(){
        $path = $this->homework->store('homeworks');

        $homework = new Homework();
        $homework->user_id = Auth::id();
        $homework->lesson_id = $this->ids;
        $homework->homework = $path;
        $homework->save();
    }
}
