<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::middleware(['auth', 'role:admin'])->group(function (){
    Route::get('admin/dashboard', [AdminController::class,'AdminDashboard'], )
    ->name('admin.dashboard');

    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin_profile/update',[AdminController::class, 'admin_profile_update']);
    Route::get('admin/users', [AdminController::class, 'admin_users']);
    Route::get('admin/users/view/{id}', [AdminController::class, 'admin_user_view']);
    Route::get('admin/email/compose', [EmailController::class, 'email_compose']);
    Route::get('admin/email/sends', [EmailController::class, 'email_sends'] );
    Route::post('admin/email/compose_post',[EmailController::class, 'email_compose_post']);
    Route::get('admin/email_sent',[EmailController::class, 'email_sends_delete']);
    
});

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('agent/dashboard', [AgentController::class,'AgentDashboard'], )
    ->name('agent.dashboard');

});

// Route::get('user/dashboard', [AgentController::class,'AgentDashboard'], )->name('agent.dashboard');
Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login');