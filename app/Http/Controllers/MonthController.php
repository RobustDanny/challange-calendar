<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonthRequest;
use App\Models\Month;
use App\Models\Day;
use App\Models\Year;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('year')){
            $month = Month::where('year', '=', request('year'))->get();
            $year = Month::where('year', '=', request('year'))->first();
            // if($month === null){
            //     $year = Month::latest()->first();
            //     dd($year);
            //     return view('year.add_month', ['year' => $year]);
            // }
            
            return view('year.screen', ['months' => $month, 'year'=> $year]);
        }else{
        $month = Month::latest()->take(12)->get();
        
        $year = Month::latest()->first();
        return view('year.screen', ['months' => $month, 'year'=> $year]);
        }

   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $month = Month::create()->save($request);
        // return view('year.screen', ['months'=>$month]);
        $year = Month::orderBy('year','desc')->first();
        $indexes = Month::createName($year);
        $days = Day::createDay($indexes);
        $months = Month::latest()->paginate(12);
        return redirect()->route('months.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $day = Day::where('month_id', "like", $id)->get();
        
        $month = Month::find($id);
  
        return view('month.show_month', ['month'=> $month, 'days'=>$day]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Month $month, Request $request)   
    {
        $month->challenge = $request->input('challenge');
        $month->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}