<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\FacebookController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/guide_patient', [HomeController::class, 'guide_patient'])->name('guide_patient');
Route::get('/medecins', [HomeController::class, 'medecins'])->name('medecins');
Route::get('/pharmacie', [HomeController::class, 'pharmacie'])->name('pharmacie');
Route::get('/prise_rdv', [HomeController::class, 'prise_rdv'])->name('prise_rdv');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog_details', [HomeController::class, 'blog_details'])->name('blog_details');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/chat', [HomeController::class, 'chat'])->name('chat');
Route::get('/product_details', [HomeController::class, 'product_details'])->name('product_details');
Route::get('/checkout_page', [HomeController::class, 'checkout_page'])->name('checkout_page');
Route::get('/recents_posts', [HomeController::class, 'recents_posts'])->name('recents_posts');
Route::get('/visio_consulting', [HomeController::class, 'visio_consulting'])->name('visio_consulting');
Route::get('/discussions', [HomeController::class, 'discussions'])->name('discussions');


// Route::get('/register', [AuthController::class, 'register'])->name('show.register');
// Route::get('/login', [AuthController::class, 'login'])->name('show.login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
