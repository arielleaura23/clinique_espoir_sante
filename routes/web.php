<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ChatController;
use App\Livewire\Chat\Index;
use App\Livewire\Chat\ChatList;
use App\Livewire\Chat\Chat;
use App\Livewire\Users;
use App\Models\Conversation;

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

use Illuminate\Support\Facades\Broadcast;

// Broadcast::routes(['middleware' => ['auth']]);

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
Route::post('/prise_rdv', [HomeController::class, 'store'])->name('appointment.store');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog_details', [HomeController::class, 'blog_details'])->name('blog_details');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/chat', [HomeController::class, 'chat'])->name('chat.robot');
Route::get('/product_details', [HomeController::class, 'product_details'])->name('product_details');
Route::get('/checkout_page', [HomeController::class, 'checkout_page'])->name('checkout_page');
Route::get('/recents_posts', [HomeController::class, 'recents_posts'])->name('recents_posts');
Route::get('/visio_consulting', [HomeController::class, 'visio_consulting'])->name('visio_consulting');

Route::get('/call', [CallController::class, 'index'])->name('call');
Route::post('/initiate-call', [CallController::class, 'initiateCall']);
Route::post('/send-answer', [CallController::class, 'sendAnswer']);

// Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

// chat humain

Route::middleware(['auth'])->group(function () {

    // Accueil du chat
    Route::get('/chat/human', Index::class)->name('chat.index');

    // Affiche une conversation précise (avec un paramètre)
    Route::get('/chat/{query}', Chat::class)->name('chat');

    // Liste des utilisateurs (pour démarrer une discussion)
    Route::get('/users', Users::class)->name('users');

    Route::get('/call/{conversation}/demo', function (\App\Models\Conversation $conversation) {
        $type = request()->query('type', 'audio');
        return view('visio_consulting', compact('type', 'conversation'));
    })->name('call.demo');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/discussions', [ChatController::class, 'index'])->name('discussions');
    Route::get('/messages/{chat_id}', [ChatController::class, 'messages']);
    Route::post('/messages', [ChatController::class, 'message'])->name('chat.message');
    Route::post('/discussions', [ChatController::class, 'store'])->middleware('auth');
});


Route::post('/contact/store', [SiteController::class, 'sendContact'])->name('contact.store');
Route::post('/newsletter/subscribe', [SiteController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile/avatar/reset', [ProfileController::class, 'resetAvatar'])->name('profile.avatar.reset');
    Route::post('/profile/info', [ProfileController::class, 'updateInfo'])->name('profile.update.info');
    // (optionnel) Préférences de notification
    Route::post('/profile/notifications', [ProfileController::class, 'updateNotifications'])->name('profile.update.notifications');
});

require __DIR__ . '/auth.php';

// routes for redirect to admin doctor or patient
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);


// change language

Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'fr'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return back();
});





// Protéger les routes des médecins avec le middleware 'auth'
// Route::middleware(['auth'])->group(function () {
//     // Route pour la liste des rendez-vous approuvés
//     Route::get('/dashboard/doctor/approved-appointments', [DoctorAppointmentController::class, 'approvedAppointments'])
//         ->name('doctor.approved_appointments');

//     // Route pour le détail d'un rendez-vous
//     Route::get('/dashboard/doctor/view-appointment-detail/{id}/{aptid}', [DoctorAppointmentController::class, 'viewAppointmentDetail'])
//         ->name('doctor.view_appointment_detail');
// });



// routes for dashboard admin

Route::prefix('admin')->group(function () {



    // Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
    // Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    // Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Doctors
    Route::get('/doctor-specialization', [AdminController::class, 'doctorSpecialization'])->name('admin.doctor.specialization');
    Route::get('/add-doctor', [AdminController::class, 'addDoctorForm'])->name('admin.doctor.add');
    Route::post('/add-doctor', [AdminController::class, 'addDoctor'])->name('admin.doctor.add.store');
    Route::get('/manage-doctors', [AdminController::class, 'manageDoctors'])->name('admin.doctor.manage');
    Route::post('/doctor-specialization', [AdminController::class, 'store'])->name('admin.doctor.specialization.store');
    Route::get('/doctor-specialization/{id}/edit', [AdminController::class, 'editDoctorSpecialization'])->name('admin.doctor.specialization.edit');
    Route::put('/admin/doctor-specialization/{id}', [AdminController::class, 'updateDoctorSpecialization'])->name('admin.doctor.specialization.update');
    Route::delete('/doctor-specialization/{id}', [AdminController::class, 'destroy'])->name('admin.doctor.specialization.delete');
    Route::delete('/manage-doctors/{id}', [AdminController::class, 'deleteDoctor'])->name('admin.doctor.delete');
    Route::get('/edit-doctor/{id}', [AdminController::class, 'editDoctor'])->name('admin.doctor.edit');
    Route::put('/doctors/update/{id}', [AdminController::class, 'updateDoctor'])->name('admin.doctor.update');



    // Users
    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('admin.users.manage');

    // Patients
    Route::get('/manage-patient', [AdminController::class, 'managePatients'])->name('admin.patients.manage');
    Route::get('/view-patient/{id}', [AdminController::class, 'viewPatient'])->name('admin.patient.view');
    Route::post('/view-patient/{id}/add-medicalhistory', [AdminController::class, 'addMedicalHistory'])->name('admin.patient.medicalhistory.add');
    Route::get('/patients/search', [AdminController::class, 'searchPatients'])->name('admin.patients.search');

    // Appointment History
    Route::get('/appointment-history', [AdminController::class, 'appointmentHistory'])->name('admin.appointment.history');

    // Contactus Queries
    Route::get('/unread-queries', [AdminController::class, 'unreadQueries'])->name('admin.queries.unread');
    Route::get('/query-details/{id}', [AdminController::class, 'queryDetails'])->name('admin.queries.details');
    Route::put('/query-details/{id}', [AdminController::class, 'updateQuery'])->name('admin.queries.update');
    Route::get('/read-queries', [AdminController::class, 'readQueries'])->name('admin.queries.read');

    Route::put('/query-edit/{id}', [AdminController::class, 'editRemark'])->name('admin.queries.editRemark');


    // Logs
    Route::get('/doctor-logs', [AdminController::class, 'doctorLogs'])->name('admin.doctor.logs');
    Route::get('/user-logs', [AdminController::class, 'userLogs'])->name('admin.user.logs');

    // Reports
    Route::get('/between-dates-reports', [AdminController::class, 'betweenDatesReports'])->name('admin.reports.between_dates');

    // Pages
    Route::get('/about-us', [AdminController::class, 'aboutUs'])->name('admin.pages.about');
    Route::get('/contact', [AdminController::class, 'contactUs'])->name('admin.pages.contact');

    // Patient Search
    Route::get('/patient-search', [AdminController::class, 'searchPatients'])->name('admin.patient.search');
    Route::get('/admin/patients/search-form', [AdminController::class, 'showSearchForm'])->name('admin.patients.searchForm');
});



// routes for dashboard doctor

Route::prefix('doctor')->group(function () {

    // Doctors
    Route::get('/doctor-specialization', [DoctorController::class, 'doctorSpecialization'])->name('doctor.doctor.specialization');
    Route::get('/add-doctor', [DoctorController::class, 'addDoctorForm'])->name('doctor.doctor.add');
    Route::post('/add-doctor', [DoctorController::class, 'addDoctor'])->name('doctor.doctor.add.store');
    Route::get('/manage-doctors', [DoctorController::class, 'manageDoctors'])->name('doctor.doctor.manage');
    Route::post('/doctor-specialization', [DoctorController::class, 'store'])->name('doctor.doctor.specialization.store');
    Route::get('/doctor-specialization/{id}/edit', [DoctorController::class, 'editDoctorSpecialization'])->name('doctor.doctor.specialization.edit');
    Route::put('/admin/doctor-specialization/{id}', [DoctorController::class, 'updateDoctorSpecialization'])->name('doctor.doctor.specialization.update');
    Route::delete('/doctor-specialization/{id}', [DoctorController::class, 'destroy'])->name('doctor.doctor.specialization.delete');
    Route::delete('/manage-doctors/{id}', [DoctorController::class, 'deleteDoctor'])->name('doctor.doctor.delete');
    Route::get('/edit-doctor/{id}', [DoctorController::class, 'editDoctor'])->name('doctor.doctor.edit'); // à créer si besoin
    Route::get('/schedule', [DoctorController::class, 'schedule'])->name('doctor.schedule');



    // Users
    Route::get('/manage-users', [DoctorController::class, 'manageUsers'])->name('doctor.users.manage');

    // Patients
    Route::get('/manage-patient', [DoctorController::class, 'managePatients'])->name('doctor.patients.manage');
    Route::get('/view-patient/{id}', [DoctorController::class, 'viewPatient'])->name('doctor.patient.view');
    Route::post('/view-patient/{id}/add-medicalhistory', [DoctorController::class, 'addMedicalHistory'])->name('doctor.patient.medicalhistory.add');

    // Appointments
    Route::get('/appointment-history', [DoctorController::class, 'appointmentHistory'])->name('doctor.appointment.history');
    Route::get('/new_appointment', [DoctorController::class, 'newAppointment'])->name('doctor.new.appointment');
    Route::get('/approved_appointment', [DoctorController::class, 'approvedAppointment'])->name('doctor.approved.appointment');
    Route::get('/cancelled_appointment', [DoctorController::class, 'cancelledAppointment'])->name('doctor.cancelled.appointment');

    Route::post('/appointments/{id}/approve', [DoctorController::class, 'approve'])->name('appointments.approve');
    Route::post('/appointments/{id}/reject', [DoctorController::class, 'reject'])->name('appointments.reject');

    // Contactus Queries
    Route::get('/unread-queries', [DoctorController::class, 'unreadQueries'])->name('doctor.queries.unread');
    Route::get('/query-details/{id}', [DoctorController::class, 'queryDetails'])->name('doctor.queries.details');
    Route::put('/query-details/{id}', [DoctorController::class, 'updateQuery'])->name('doctor.queries.update');
    Route::get('/read-queries', [DoctorController::class, 'readQueries'])->name('doctor.queries.read');

    // Logs
    Route::get('/doctor-logs', [DoctorController::class, 'doctorLogs'])->name('doctor.doctor.logs');
    Route::get('/user-logs', [DoctorController::class, 'userLogs'])->name('doctor.user.logs');

    // Reports
    Route::get('/between-dates-reports', [DoctorController::class, 'betweenDatesReports'])->name('doctor.reports.between_dates');

    // Pages
    Route::get('/about-us', [DoctorController::class, 'aboutUs'])->name('doctor.pages.about');
    Route::get('/contact', [DoctorController::class, 'contactUs'])->name('doctor.pages.contact');

    Route::post('/messages', [ChatController::class, 'message'])->name('chat.message');
});
