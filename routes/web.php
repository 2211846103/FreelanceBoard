<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contracts', ContractController::class);
