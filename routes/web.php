<?php

use App\Mail\NewUserMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('landingpage');

Route::get('/login', function(){
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::resource('admin/manage-users', UserController::class)->names([
            'index' => 'manage-user',
            'create' => 'create-user',
            'store' => 'store-user',
            'show' => 'show-user',
            'edit' => 'edit-user',
            'update' => 'update-user',
            'destroy' => 'delete-user',
        ]);
    });

    Route::resource('admin/manage-product', ProductController::class)->names([
        'index' => 'manage-product',
        'create' => 'create-product',
        'store' => 'store-product',
        'show' => 'show-product',
        'edit' => 'edit-product',
        'update' => 'update-product',
        'destroy' => 'delete-product',
    ]);

    Route::post('admin/manage-users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('toggle-user-status');
    Route::post('admin/manage-product/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('toggle-product-status');

});

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/send-test-email', function () {

//     $user = new App\Models\User(); // Anda bisa membuat user dummy
//     $user->email = 'your_email@example.com'; // Ganti dengan email Anda
//     $user->name = 'Test User'; // Nama pengguna dummy

//     $password = Str::random(10); // Password dummy

//     Mail::to($user->email)->send(new NewUserMail($user, $password));
    
//     return 'Email sent!';
// });

