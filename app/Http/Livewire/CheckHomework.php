<?php

namespace App\Http\Livewire;

use App\Models\Homework;
use Illuminate\Support\Facades\Storage;
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
    function downloadHomework($link){
        return Storage::download($link);
    }
    function deleteHomework($link, $id){
        Homework::where('id', $id)->delete();
        return Storage::delete($link);
    }
}
