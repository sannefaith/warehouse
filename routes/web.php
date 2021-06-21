<?php

use App\Http\Controllers;
use App\Http\Controllers\Admins;
use App\Http\Controllers\Admins\AdminUserController;
use App\Http\Controllers\Admins\OwnersController;
use App\Http\Controllers\ContactController;
use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Route;

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

;

Auth::routes();

//Home Controllers
Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);

//Profile Controllers
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');

//Posts Controllers
Route::get('/p/create',[App\Http\Controllers\PostsController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/{post}',[App\Http\Controllers\PostsController::class, 'show']);
Route::get('/p/{post}/delete', [App\Http\Controllers\PostsController::class, 'destroy'])->name('post.destroy');

//Email Controllers
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'create'])->name('emails.contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('emails.send');
Route::get('/email', function(){
    return new NewUserWelcomeMail();
});

//Admin Role Controllers
Route::middleware('auth','admin', 'verified')->prefix('admin')->group(
    function(){
    Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.index');
    Route::get('/roles/create', [App\Http\Controllers\Admins\RoleController::class, 'create'])->name('admins.createRoles');
    Route::post('/roles/store', [App\Http\Controllers\Admins\RoleController::class, 'store']);
    Route::get('/roles/{role}/show',[App\Http\Controllers\Admins\RoleController::class, 'show'])->name('admins.editRoles');
    Route::get('/roles', [App\Http\Controllers\Admins\RoleController::class, 'index'])->name('admins.showRoles');
    Route::patch('/roles/{role}/update',[App\Http\Controllers\Admins\RoleController::class, 'update'])->name('admins.update');
    Route::get('/roles/{role}',[App\Http\Controllers\Admins\RoleController::class, 'destroy'])->name('admins.destroy');

});

//Admin User Controllers
Route::middleware('auth','admin', 'verified')->prefix('admin')->group(function(){
    Route::get('/users', [\App\Http\Controllers\Admins\AdminUserController::class, 'index'])->name('admins.users.showUsers');
    Route::get('/users/{user}/show', [AdminUserController::class, 'show'])->name('admins.users.editUsers');
    Route::get('/users/{user}', [App\Http\Controllers\Admins\AdminUserController::class, 'destroy'])->name('admins.users.destroy');
    Route::patch('/users/{user}/update',[App\Http\Controllers\Admins\AdminUserController::class, 'update'])->name('admins.users.update');

});

//Admin Owner Controllers
Route::middleware('auth','admin', 'verified')->prefix('admin')->group(function(){
    Route::get('/owners', [\App\Http\Controllers\Admins\OwnersController::class, 'index'])->name('admins.owners.showOwners');
    Route::get('/owners/{user}/show', [OwnersController::class, 'show'])->name('admins.owners.editOwners');
    Route::get('/owners/{user}',[App\Http\Controllers\Admins\OwnersController::class, 'destroy'])->name('admins.owners.destroy');
    Route::patch('/owners/{user}/update',[App\Http\Controllers\Admins\OwnersController::class, 'update'])->name('admins.owners.update');

});