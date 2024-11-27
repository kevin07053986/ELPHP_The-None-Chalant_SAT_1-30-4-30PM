<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::post('/mock-login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/events', [EventController::class, 'store']);
    Route::get('budget/{userId}', [BudgetController::class, 'getBudget']);
Route::put('budget/{userId}', [BudgetController::class, 'updateBudget']);
Route::post('expense/{userId}', [ExpenseController::class, 'addExpense']);
Route::get('expenses/{userId}', [ExpenseController::class, 'getExpenses']);

});



Route::get('/hello', function () {
    return 'Hello';
});