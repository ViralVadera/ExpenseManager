<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExpenseCategoryController;


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

Route::group(['prefix' => '/'], function(){
    
    
    Route::get('/', [LoginController::class,'index'])->name('account.login');
    Route::get('/login', [LoginController::class,'index'])->name('account.login');
    Route::get('/register', [LoginController::class,'register'])->name('account.register');
    Route::post('/prosses_register', [LoginController::class,'prossesRegister'])->name('account.prossesregister');
    Route::post('/loginauth', [LoginController::class,'authenticate'])->name('account.auth');
    

    Route::get('/logout', [LoginController::class,'logout'])->name('account.logout');
   
    Route::middleware(['auth', 'checkRole:admin'])->group(function () {
        
        Route::prefix('admin')->group(function () {
            Route::get('/', [DashboardController::class,'index'])->name('account.dashboard');
            
            // User management routes
            Route::get('/users', [AdminController::class, 'index'])->name('admin.users.index');
            Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
            Route::put('/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
            Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
        
            // Expense category management routes
            Route::get('/expense-categories', [ExpenseCategoryController::class, 'index'])->name('admin.expense_categories.index');
            Route::get('/expense-categories/create', [ExpenseCategoryController::class, 'create'])->name('admin.expense_categories.create');
            Route::post('/expense-categories', [ExpenseCategoryController::class, 'store'])->name('admin.expense_categories.store');
            Route::get('/expense-categories/{category}/edit', [ExpenseCategoryController::class, 'edit'])->name('admin.expense_categories.edit');
            Route::put('/expense-categories/{category}', [ExpenseCategoryController::class, 'update'])->name('admin.expense_categories.update');
            Route::delete('/expense-categories/{category}', [ExpenseCategoryController::class, 'destroy'])->name('admin.expense_categories.destroy');
        });
    });
    
    Route::middleware(['auth', 'checkRole:user'])->group(function () {
        Route::get('user/dashboard', function () {
            return "You user.";
        })->name('user.dashboard');
    });
    
    Route::get('/unauthorized', function () {
        return "You are not authorized to access this page.";
    })->name('unauthorized');
});