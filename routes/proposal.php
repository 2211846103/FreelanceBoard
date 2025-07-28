<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

Route::resource('proposals', ProposalController::class);


