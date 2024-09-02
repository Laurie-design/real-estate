<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RequeteController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CategorieController;

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

    Route::get('/agent', [AgentController::class, 'index'])->name('agent.dashboard');

    Route::get('agent/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('agent/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('agent/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('agent/requetes/list', [RequeteController::class, 'index'])->name('agent.requetes.list');
    
    Route::get('agent/demandes/list', [DemandeController::class, 'index'])->name('agent.demandes.list');

    // Owners

    Route::get('agent/owner/list', [OwnerController::class, 'index'])->name('agent.owner.list');
    Route::get('agent/owner/create', [OwnerController::class, 'create'])->name('agent.owner.create');
    Route::post('agent/owner/store', [OwnerController::class, 'store'])->name('agent.owner.store');

    // Categories

    Route::get('agent/categorie/list', [CategorieController::class, 'index'])->name('agent.categorie.list');
    Route::get('agent/categorie/create', [CategorieController::class, 'create'])->name('agent.categorie.create');
    Route::post('agent/categorie/store', [CategorieController::class, 'store'])->name('agent.categorie.store');

    // Properties

    Route::get('agent/property/list', [PropertyController::class, 'indexAgent'])->name('agent.property.list');
    Route::get('agent/property/show/{id}', [PropertyController::class, 'show'])->name('agent.property.show');

    Route::get('agent/property/add', [PropertyController::class, 'create'])->name('property.create');
    Route::post('agent/properties/store', [PropertyController::class, 'store'])->name('property.store');

    Route::get('agent/property/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
    Route::put('agent/property/update/{id}', [PropertyController::class, 'update'])->name('property.update');

    Route::delete('agent/property/delete/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');

});

require __DIR__.'/auth.php';

// Route::middleware(['auth', 'role:agent'])->group(function () {});


// CLIENT ET VISITEURS

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.list');

Route::get('property/{id}', [PropertyController::class, 'visitorShow'])->name('property.show');

Route::get('/requete/create', [RequeteController::class, 'create'])->name('requete.create');
Route::get('/requete/store', [RequeteController::class, 'store'])->name('requete.store');

Route::post('/demande/store/{id}', [DemandeController::class, 'store'])->name('demande.store');








// todo
Route::get('/about', [AboutController::class, 'showAboutPage'])->name('about');
Route::get('contact', [ContactController::class, 'showContactPage'])->name('contact');
Route::post('contact/send', [ContactController::class, 'sendContact'])->name('contact.send');
Route::get('/sales', [SalesController::class, 'index'])->name('sales');
