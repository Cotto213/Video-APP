<?php

use App\Http\Controllers\UserController;
use App\Models\Video;
use App\Models\Comment;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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




Route::get('/videos/{id}', [\App\Http\Controllers\VideosController::class, 'show']) ->name('videos.show');

Route::resource("user",UserController::class)->except("index")->names(["create"=>"register"]);
Route::resource("user",UserController::class)->except("index")->names(["getLogin"=>"login"]);
Route::resource("user",UserController::class)->except("index")->names(["show"=>"profile"]);
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'getLogin'])->name('login');
    Route::post('/login', [UserController::class, 'postLogin']);
    Route::get('/register', [UserController::class, 'getRegister'])->name('register');
    Route::post('/register', [UserController::class, 'postRegister']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/delete-video', function () { return Inertia::render('DeleteVideo');}) ->name('deleteVideo');
    Route::get('/upload-video', function () { return Inertia::render('UploadVideo');}) ->name('uploadVideo');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'videos' => Video::inRandomOrder()->get()
        ]);
    })->name('home');
    Route::get('/profile',[UserController::class, 'show'])->name('profile');



});




