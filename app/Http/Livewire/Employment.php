<?php

namespace App\Http\Livewire;

use App\Models\Employments;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Employment extends Component
{
    public $weekday;
    public $employments=[];

    public function render()
    {
        return view('livewire.employment');
    }
    function filter(){
        $this->employments=  Employments::where('teacher_id', Auth::id())->where('weekdays', $this->weekday)->get();
        return $this->employments;
    }
    public function on($id){
        Employments::where('id',$id)->update(['employ'=>1]);
       return $this->filter();
    }
    public function off($id){
        Employments::where('id',$id)->update(['employ'=>0]);
        return $this->filter();

    }

}
