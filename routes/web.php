<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;

// Публичные маршруты
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/schedule', [SiteController::class, 'schedule'])->name('schedule');
Route::get('/contacts', [SiteController::class, 'contacts'])->name('contacts');

// Маршруты для гостей (неавторизованных)
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    // Register
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Маршруты для авторизованных пользователей
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    // Ticket routes
    Route::prefix('ticket')->name('ticket.')->group(function () {
        Route::get('/create', [TicketController::class, 'create'])->name('create');
        Route::post('/store', [TicketController::class, 'store'])->name('store');
        Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
    });
    
    // Booking routes
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/skates', [BookingController::class, 'skates'])->name('skates');
        Route::post('/store', [BookingController::class, 'store'])->name('store');
        Route::get('/{booking}', [BookingController::class, 'show'])->name('show');
    });
    
    // Payment routes
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('/process', [PaymentController::class, 'process'])->name('process');
        Route::get('/success', [PaymentController::class, 'success'])->name('success');
        Route::get('/fail', [PaymentController::class, 'fail'])->name('fail');
    });
});

// Админ-панель
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Skates management
    Route::resource('skates', App\Http\Controllers\Admin\SkateController::class);
    
    // Bookings management
    Route::prefix('bookings')->name('bookings.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('index');
        Route::get('/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'show'])->name('show');
        Route::put('/{booking}/status', [App\Http\Controllers\Admin\BookingController::class, 'updateStatus'])->name('update-status');
        Route::delete('/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('destroy');
    });
    
    // Tickets management
    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\TicketController::class, 'index'])->name('index');
        Route::get('/{ticket}', [App\Http\Controllers\Admin\TicketController::class, 'show'])->name('show');
        Route::put('/{ticket}/status', [App\Http\Controllers\Admin\TicketController::class, 'updateStatus'])->name('update-status');
        Route::delete('/{ticket}', [App\Http\Controllers\Admin\TicketController::class, 'destroy'])->name('destroy');
    });
// routes/web.php - обновляем секцию админ-панели

// Админ-панель
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Skates management (resource уже включает все методы)
    Route::resource('skates', App\Http\Controllers\Admin\SkateController::class);
    
    // Bookings management
    Route::prefix('bookings')->name('bookings.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('index');
        Route::get('/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'show'])->name('show');
        Route::put('/{booking}/status', [App\Http\Controllers\Admin\BookingController::class, 'updateStatus'])->name('update-status');
        Route::delete('/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('destroy');
    });
    
    // Tickets management
    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\TicketController::class, 'index'])->name('index');
        Route::get('/{ticket}', [App\Http\Controllers\Admin\TicketController::class, 'show'])->name('show');
        Route::put('/{ticket}/status', [App\Http\Controllers\Admin\TicketController::class, 'updateStatus'])->name('update-status');
        Route::delete('/{ticket}', [App\Http\Controllers\Admin\TicketController::class, 'destroy'])->name('destroy');
        
        // Добавляем поддержку POST для тех случаев, когда форма не поддерживает PUT
        Route::post('/{ticket}/status', [App\Http\Controllers\Admin\TicketController::class, 'updateStatus'])->name('update-status-post');
    });
});
});