<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


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


Route::get('/register', [AuthController::class, 'register'])->name('show.register');
Route::get('/login', [AuthController::class, 'login'])->name('show.login');

