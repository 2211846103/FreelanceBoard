<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

// استخدم resource فقط أو routes مفصلة، وليس الاثنين معاً
Route::resource('proposal', ProposalController::class);

// إذا أردت استخدام routes مفصلة فقط، احذف السطر السابق واستخدم التالي:

Route::get('/proposal', [ProposalController::class, 'index'])->name('proposal.index');
Route::get('/proposal/create', [ProposalController::class, 'create'])->name('proposal.create');
Route::post('/proposal', [ProposalController::class, 'store'])->name('proposal.store');
Route::get('/proposal/{id}', [ProposalController::class, 'show'])->name('proposal.show');
Route::get('/proposal/{id}/edit', [ProposalController::class, 'edit'])->name('proposal.edit');
Route::put('/proposal/{id}', [ProposalController::class, 'update'])->name('proposal.update');
Route::delete('/proposal/{id}', [ProposalController::class, 'destroy'])->name('proposal.destroy');
