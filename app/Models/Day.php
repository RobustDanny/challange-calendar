<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    public function month(){
        return $this->belongsTo(Month::class);
    }

    public static function createDay($indexes){

        for($i = 0; $i < count($indexes); $i++)
        if (Month::find($indexes[$i])->month_name === "Jan" ||
        Month::find($indexes[$i])->month_name === "Mar" ||
        Month::find($indexes[$i])->month_name === "May" ||
        Month::find($indexes[$i])->month_name === "Jul" ||
        Month::find($indexes[$i])->month_name === "Aug" ||
        Month::find($indexes[$i])->month_name === "Oct" ||
        Month::find($indexes[$i])->month_name === "Dec"){
            $j = 0;
            while($j < 31){
                $day = new Day;
                $day->month_id = $indexes[$i];
                $day->complete = false;
                $day->name = $j + 1;
                $day->save();
                ++$j;
            }
            
        }elseif(Month::find($indexes[$i])->month_name === "Apr" ||
        Month::find($indexes[$i])->month_name === "Jun" ||
        Month::find($indexes[$i])->month_name === "Sep" ||
        Month::find($indexes[$i])->month_name === "Nov"){
            $j = 0;
            while($j < 30){
                $day = new Day;
                $day->month_id = $indexes[$i];
                $day->complete = false;
                $day->name = $j + 1;
                $day->save();
                ++$j;
            }
        }else{
            $j = 0;
            while($j < 29){
                $day = new Day;
                $day->month_id = $indexes[$i];
                $day->complete = false;
                $day->name = $j + 1;
                $day->save();
                ++$j;
            }
        }
        return Day::get();
    }

    public function toggleComplete(){
        $this->complete = !$this->complete;
        $this->save();
    }
}