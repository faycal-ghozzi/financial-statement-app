<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinancialStatementController;

Route::get('/financial-statement', [FinancialStatementController::class, 'index']);
Route::post('/financial-statement', [FinancialStatementController::class, 'store'])->name('financial-statement.store');

Route::get('/fetch-financial-statements', [FinancialStatementController::class, 'fetchAll'])->name('financial-statements.fetch_all');
Route::get('/financial-statements/{id}', [FinancialStatementController::class, 'show'])->name('financial-statements.show');


Route::get('/', function () {
    return view('welcome');
});
