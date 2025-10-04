<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;    
Route::get('/we', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/projects', [ProjectsController::class, 'projects'])->name('pages.projects');
Route::get('/projects', [ProjectController::class, 'index']);
 


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// admin routes//

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::get('/projects', [ProjectController::class, 'publicIndex'])->name('projects.public');

// Dashboard (admin) - show list + create form
Route::middleware(['auth','is_admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/dashboard/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/dashboard/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/dashboard/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/dashboard/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/dashboard/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    // Profile routes
    Route::get('/dashboard/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('admin.profile');
    Route::put('/dashboard/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('admin.profile.update');
    
    // Contacts routes
    Route::get('/dashboard/contacts', [App\Http\Controllers\AdminContactsController::class, 'index'])->name('admin.contacts');
    Route::get('/dashboard/contacts/{contact}', [App\Http\Controllers\AdminContactsController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/dashboard/contacts/{contact}', [App\Http\Controllers\AdminContactsController::class, 'destroy'])->name('admin.contacts.destroy');
    Route::delete('/dashboard/contacts/messages/{message}', [App\Http\Controllers\AdminContactsController::class, 'destroyMessage'])->name('admin.contacts.destroy-message');
    
    // Mark all as read route
    Route::post('/dashboard/mark-all-read', [App\Http\Controllers\AdminContactsController::class, 'markAllAsRead'])->name('admin.mark-all-read');
    
    // Categories routes
    Route::resource('/dashboard/categories', App\Http\Controllers\AdminCategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy'
    ]);
    
    // Settings routes
    Route::get('/dashboard/settings', [App\Http\Controllers\AdminSettingsController::class, 'index'])->name('admin.settings');
    Route::put('/dashboard/settings', [App\Http\Controllers\AdminSettingsController::class, 'update'])->name('admin.settings.update');
    Route::post('/dashboard/settings/reset', [App\Http\Controllers\AdminSettingsController::class, 'reset'])->name('admin.settings.reset');
});
// middleware for admin routes//
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

//     Route::resource('/projects', ProjectController::class);
// });


// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });



// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminAuthController::class, 'index'])->name('admin.dashboard');
// });




// projects routes//
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::resource('/projects', \App\Http\Controllers\Admin\ProjectController::class);
// });

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Route::middleware(['auth', 'is_admin'])->group(function () {
//     Route::resource('projects', ProjectController::class);
// });


Route::resource('projects', ProjectController::class);
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
 //Logout route//
 Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



 //portfolio//
Route::get('/portfolio', [ProjectController::class, 'publicIndex'])->name('portfolio');

// Age Calculator
Route::get('/age-calculator', function () {
    return view('age-calculator');
})->name('age-calculator');

// QR Code Generator
Route::get('/qr-generator', function () {
    return view('qr-generator');
})->name('qr-generator');

// Debug route for categories
Route::get('/debug-categories', function () {
    $categories = \App\Models\Category::active()->ordered()->get();
    return response()->json([
        'count' => $categories->count(),
        'categories' => $categories->toArray()
    ]);
});