<?php
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;





Route::resource('contracts', ContractController::class);

require_once 'jobs.php';
require_once 'proposal.php';