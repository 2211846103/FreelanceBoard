<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::resource("jobs", JobListingController::class);