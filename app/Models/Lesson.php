<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    function Group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Group');
    }
    function isHomework()
    {
        return $this->hasMany('App\Models\Homework')->where('lesson_id', $this->id)->count();
    }
    function average($arr){
        $r = 0;
        for($i=0; $i<count($arr); $i++){
            $r+=$arr[$i];
        }
        return $r/count($arr);
    }
    function rating()
    {
        $homeworks =  $this->hasMany('App\Models\Homework')->where('lesson_id', $this->id)->get();
        $ratings = [];
        foreach($homeworks  as $key){
            $ratings[]=$key['rating'];
        }
        return $this->average($ratings);
    }
}
