<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertyController;

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

// AGENT IMMOBILIER

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/agent/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/property/add', [PropertyController::class, 'create'])->name('property.create');
    Route::post('/properties/store', [PropertyController::class, 'store'])->name('property.store');

    Route::get('property/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
    Route::put('property/update/{id}', [PropertyController::class, 'update'])->name('property.update');

    Route::delete('property/delete/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');

});

require __DIR__.'/auth.php';

// Route::middleware(['auth', 'role:agent'])->group(function () {});


// CLIENT ET VISITEURS

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.list');

Route::get('property/{id}', [PropertyController::class, 'visitorShow'])->name('property.show');








// todo
Route::get('/about', [AboutController::class, 'showAboutPage'])->name('about');
Route::get('contact', [ContactController::class, 'showContactPage'])->name('contact');
Route::post('contact/send', [ContactController::class, 'sendContact'])->name('contact.send');


Route::get('/sales', [SalesController::class, 'index'])->name('sales');
