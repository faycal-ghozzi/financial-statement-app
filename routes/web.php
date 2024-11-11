<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinancialStatementController;

Route::get('/financial-statement', [FinancialStatementController::class, 'index']);
Route::post('/financial-statement', [FinancialStatementController::class, 'store'])->name('financial-statement.store');

// Route::get('/financial-statements/step/1', [FinancialStatementController::class, 'stepOne'])->name('financial.step.one');
// Route::post('/financial-statements/step/2', [FinancialStatementController::class, 'stepTwo'])->name('financial.step.two');
// Route::post('/financial-statements/step/3', [FinancialStatementController::class, 'stepThree'])->name('financial.step.three');
// Route::post('/financial-statements/validate-totals', [FinancialStatementController::class, 'validateTotals'])->name('financial.validateTotals');
// Route::get('/financial-statements/step/4', [FinancialStatementController::class, 'stepFour'])->name('financial.step.four');
// Route::post('/financial-statements/store', [FinancialStatementController::class, 'store'])->name('financial.store');


Route::get('/', function () {
    return view('welcome');
});
