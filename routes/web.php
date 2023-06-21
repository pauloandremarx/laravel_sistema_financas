<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;//stack over flow

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Models\Expense;
use App\Models\Income;

Route::get('/', [ExpenseController::class, 'index']);
Route::get('/', [IncomeController::class, 'index']);

//criação de receitas
Route::get('/incomes/income', [IncomeController::class, 'create'])->middleware('auth');

//criação de gastos
Route::get('/expenses/create', [ExpenseController::class, 'create'])->middleware('auth');

//tabela de gastos
Route::get('/expenses/expenseTable', [ExpenseController::class, 'table']);

//tabela de receitas
Route::get('/incomes/incomeTable', [IncomeController::class, 'table']);

//exclusão de gastos
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy']);

//exclusão de receitas
Route::delete('/incomes/{id}', [IncomeController::class, 'destroy']);

//edição de receitas
Route::get('/incomes/edit/{id}', [IncomeController::class, 'edit']);

//edição de gastos
Route::get('/expenses/edit/{id}', [ExpenseController::class, 'edit']);

//atualização de gastos
Route::put('/expenses/update/{id}', [ExpenseController::class, 'update']);

//atualização de receitas
Route::put('/incomes/update/{id}', [IncomeController::class, 'update']);




//rota de envio dos dados do fomulario de criação de despesas
Route::post('/expenses', [ExpenseController::class, 'store']);


//rota de envio dos dados do fomulario de criação de receitas
Route::post('/incomes', [IncomeController::class, 'store']);

//teste
Route::get('/incomes/teste', [IncomeController::class, 'sum']);
Route::post('/incomes/teste', [IncomeController::class, 'sum']);



Route::get('/test', function () {
    return view('test');
});

Route::get('/controlPanel', function () {
    return view('controlPanel');
});



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
