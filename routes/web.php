<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DraftController;
use Illuminate\Support\Facades\Auth;


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
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);



Route::put('/movies/{movie}/draft', [MovieController::class, 'makeDraft'])->name('post.draft');

Route::delete('/movies/{movie}', [MovieController::class, 'deleteMovie'])->name('post.delete');

// Route untuk halaman edit movie
Route::get('/movies/{id}/edit', [MovieController::class, 'editMovie'])->name('movie.edit');

Route::get('/movies', [MovieController::class, 'allMovies'])->name('movie.all');

Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');


Route::get('/movie/{id}/watch', [MovieController::class, 'play'])->name('movie.play');





Route::prefix("admin")->group(function () {
    Route::controller(AdminController::class)->group(function () {
        //    login route
        Route::match(['get', 'post'], '/login', 'login')->name('admin.login');

        Route::middleware("auth:admin")->group(function () {
            Route::get("/", 'index')->name('admin.dashboard');
            Route::get("/logout", 'logout')->name('admin.logout');
        });

        Route::post('/', function () {
            Auth::logout(); // Logout user
            return redirect('/',); // Redirect ke halaman "/"
        })->name('logout');

        Route::controller(CategoryController::class)->group(function () {

            Route::get('/all-category', 'index')->name('category.all');
            Route::get('/create-category', 'createCategory')->name('category.create');

            Route::post('/store-category', 'store')->name('category.store');
            Route::get('/edit-category/{id}', 'edit')->name('category.edit');
            Route::post('/update-category/{id}', 'update')->name('category.update');
            Route::get('/delete-category/{id}', 'destroy')->name('category.delete');
        });

        Route::controller(MovieController::class)->group(function () {
            Route::get('/all-drafts', 'allDrafts')->name('drafts.all');
            Route::get('/all-movies', 'allMovies')->name('movies.all');
            Route::get('/create-movie-page', 'createMovie')->name('movie.create');
            Route::post('/create-movie-page/create', 'createNewMovie')->name('movie.new');
            Route::get('/edit-movie-page/{id}', 'editMovie')->name('movie.edit');
            Route::post('/update-movie-page/{id}', 'updateMovie')->name('movie.update');
            Route::get('/make-public/{movieId}', 'makePublic')->name('movie.public');
            Route::get('/make-draft/{movieId}', 'makeDraft')->name('movie.draft');
            Route::get('/delete-movie/{movieId}', 'deleteMovie')->name('movie.delete');


            // recycle
            Route::get('/recycle-movie-page', 'openRecycleMoviePage')->name('movie.recycle');
            Route::get('/permanent-delete-movie/{movieId}', 'permanentDeleteMovie')->name('movie.permanentDelete');
        });
    });
});
