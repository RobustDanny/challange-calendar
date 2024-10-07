<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function days(){
        return $this->hasMany(Day::class);
    }

    static function createName($year){


        $names = [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];

        $indexes = [];

        $i = 0;
        while($i < count($names)){
            $month = new Month;
            $month->month_name = $names[$i];
            $month->year = $year->year + 1;
            $month->challenge = "";
            $month->save();

            array_push($indexes, $month->id);

            $i++;
        }

        return $indexes;
        

    }
    
}