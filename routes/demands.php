<?php
use App\Http\Controllers\DemandController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

Route::resource('demands', DemandController::class);