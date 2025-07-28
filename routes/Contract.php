<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;


Route::resource('contracts', ContractController::class);
