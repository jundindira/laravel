<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Models\Post;
use App\Models\User;

// 127.0.0.1:8000 => view welcome
// Route::get('/', function () {
//     return view('welcome');
// });

// // 127.0.0.1:8000/admin => <h1>saya admin</h1>
// Route::get('/admin', function () {
//     return "<h1>saya admin</h1>";
// });

// // 127.0.0.1:8000/admin/1 => <h1>saya admin dengan id 1</h1>
// Route::get('/admin/{id}', function ($id) {
//     return "<h1>saya admin dengan id $id</h1>";
// })->where('id', '[0-9]+');

// // 127.0.0.1:8000/admin/1 => <h1>saya admin dengan id 1 & nama abc</h1>
// Route::get('/admin/{id}/{nama}', function ($id, $nama) {
//     return "<h1>saya admin dengan id $id & nama $nama</h1>";
// })->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);

// Route::get('admin', [AdminController::class, 'index']);
// Route::get('admin/{id}', [AdminController::class, 'detail'])->where('id', '[0-9]+');

Route::get('/home', function() {
    return view('home', ['title' => 'Welcome']);
});

Route::get('/about', function() {
    return view('about', ['nama' => 'Dyah', 'title' => 'About']);
});

Route::get('/', function() {
    return view('pages', ['title' => 'Home', 'posts' => Post::all() ]);
});

Route::get('/posts/{post:slug}', function(Post $post) {
    //$post = Post::find($slug);
    return view('page', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {
    return view('pages', ['title' => count($user->posts) . ' Article by ' .$user->name, 'posts' => $user->posts]);
});

Route::get('/contact', function() {
    return view('contact', ['title' => 'Contact']);
});

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts/create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return 'Welcome to your dashboard';
})->middleware('auth');

// Route::get('/', [HalamanController::class, 'index']);
// Route::get('/kontak', [HalamanController::class, 'kontak']);
// Route::get('/tentang', [HalamanController::class, 'tentang']);

Route::resource('admin', AdminController::class);

Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);