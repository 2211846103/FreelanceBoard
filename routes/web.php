<?php
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

Route::get('/proposal', function () {
    return view('create');
});

Route::get('/proposal', [ProposalController::class, 'index'])->name('home');