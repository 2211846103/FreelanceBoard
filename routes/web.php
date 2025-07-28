<?php
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

Route::get('/proposal', function () {
    return view('create');
});

<<<<<<< HEAD
Route::get('/proposal', [ProposalController::class, 'index'])->name('home');
=======
Route::resource('contracts', ContractController::class);

require_once 'jobs.php';
>>>>>>> 3b6d7f0e01c355297d5ad32a8efdb5cd502c105e
