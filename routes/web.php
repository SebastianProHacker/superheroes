<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;

Route::resource('superheroes', SuperheroeController::class)->parameters([
    'superheroes' => 'superheroe'
]);

Route::get('/', function () {
    return redirect()->route('superheroes.index');
});
