<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;

// Routes pour les commandes
Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');
Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');
Route::get('/commandes/{commande}', [CommandeController::class, 'show'])->name('commandes.show');
Route::get('/commandes/{commande}/edit', [CommandeController::class, 'edit'])->name('commandes.edit');
Route::put('/commandes/{commande}', [CommandeController::class, 'update'])->name('commandes.update');
Route::delete('/commandes/{commande}', [CommandeController::class, 'destroy'])->name('commandes.destroy');

// Route pour mettre à jour la quantité d'un produit dans la commande
Route::put('/commandes/{commande}/produits/{produit}', [CommandeController::class, 'updateQuantity'])->name('commandes.updateQuantity');

// Route pour supprimer un produit d'une commande
Route::delete('/commandes/{commande}/produits/{produit}', [CommandeController::class, 'deleteProduct'])->name('commandes.deleteProduct');

// Route pour ajouter un produit à une commande (avec upload de fichier)
Route::post('/commandes/{commande}/add-product', [CommandeController::class, 'addProduct'])->name('commandes.addProduct');
// Routes d'authentification
Route::get('/inscription', [AuthController::class, 'showInscription'])->name('inscription');
Route::post('/inscription', [AuthController::class, 'register']);
Route::get('/connexion', [AuthController::class, 'showConnexion'])->name('connexion');
Route::post('/connexion', [AuthController::class, 'login']);
Route::get('/profil', [AuthController::class, 'profil'])->name('profil')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//product
Route::resource('/produit', ProduitController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
use App\Http\Controllers\Api\RoomController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('rooms', RoomController::class);
});


