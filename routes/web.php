<?php

use App\Http\Controllers\backend\admin\LoanController;
use App\Http\Controllers\backend\admin\LoanTypeController;
use App\Http\Controllers\backend\admin\UsersController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    Route::get('admin/all-user', [UsersController::class, 'allUser'])->name('admin.allUser');
    Route::get('/admin/user-details/{id}', [UsersController::class, 'userDetail'])->name('user.detail');
    Route::delete('/admin/delete-user/{id}', [UsersController::class, 'deleteUser'])->name('delete.user');

    Route::patch('/admin/update-role/{id}', [UsersController::class, 'updateRole'])->name('admin.updateRole');
    Route::patch('/admin/update-status/{id}', [UsersController::class, 'updateStatus'])->name('admin.updateStatus');

    Route::get('admin/all-loan-type', [LoanTypeController::class, 'allLoanType'])->name('admin.allLoanType');
    Route::post('admin/add/loan-type', [LoanTypeController::class, 'addLoanType'])->name('admin.addLoanType');
    Route::get('/admin/edit/loan-type/{id}', [LoanTypeController::class, 'editLoanType'])->name('edit.LoanType');
    Route::put('/admin/update/loan-type/{id}', [LoanTypeController::class, 'updateLoanType'])->name('update.LoanType');
    Route::delete('/admin/delete/loan-type/{id}', [LoanTypeController::class, 'deleteLoanType'])->name('delete.LoanType');

    Route::get('admin/all-loan-application', [LoanController::class, 'allLoanApplication'])->name('admin.all.LoanApplication');
    Route::get('admin/application-details/{id}', [LoanController::class, 'applicationDetail'])->name('admin.application.detail');
    Route::patch('/admin/application/update-status/{id}', [LoanController::class, 'applicationUpdateStatus'])->name('admin.application.updateStatus');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('user/loan/application', [LoanController::class, 'LoanApplication'])->name('user.LoanApplication');
    Route::post('user/loan/calculate', [LoanController::class, 'calculateInstallments'])->name('loan.calculate');
    Route::post('user/loan/store', [LoanController::class, 'store'])->name('loan.store');

    //Route::post('user/apply/loan-application', [LoanController::class, 'applyLoanApplication'])->name('user.apply.LoanApplication');
});

require __DIR__ . '/auth.php';
