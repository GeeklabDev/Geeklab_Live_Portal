<?php

namespace App\Http\Livewire;

use App\Models\Homework;
use Livewire\Component;

class CheckHomework extends Component
{
    public $message;
    public $rating;
    public function render()
    {
        $homeworks = Homework::with('lesson.group.user')->get();
        return view('livewire.check-homework')->with('homeworks', $homeworks);
    }
}
