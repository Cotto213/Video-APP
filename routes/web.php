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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'videos' => Video::inRandomOrder()->get()
]);
})-> name('home');
Route::get('/delete-video', function () { return Inertia::render('DeleteVideo');}) ->name('deleteVideo');
Route::get('/upload-video', function () { return Inertia::render('UploadVideo');}) ->name('uploadVideo');

Route::get('/videos/{id}', [\App\Http\Controllers\VideosController::class, 'show']) ->name('videos.show');

Route::resource("user",UserController::class)->except("index")->names(["create"=>"user.register"]);

Route::get('user/login', [UserController::class, 'getLogin'])->name('user.login');
Route::post('user/login', [UserController::class, 'postLogin']);


