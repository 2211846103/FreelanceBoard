<?php
<<<<<<< Updated upstream
=======
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;


Route::get('/payment/test', function () {
    return 'Payment route is working 🎉';
});
>>>>>>> Stashed changes



require_once 'Contract.php';
require_once 'jobs.php';
require_once 'User.php';

require_once 'demands.php';
require_once 'review.php';