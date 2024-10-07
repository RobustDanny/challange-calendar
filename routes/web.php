<?php

use App\Models\Day;
use App\Http\Controllers\MonthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('months.index');
});


Route::resource('months', MonthController::class);

Route::get('/months/{day}/toggle-complete', function (Day $day) {
    $day->toggleComplete();
    return redirect()->back();
})->name('day.toggle');
