<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\HistoriqueController;
// Routes accessibles sans authentification
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

// Routes protégées par l'authentification
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('livres', LivreController::class);
    Route::resource('auteurs', AuteurController::class);
    Route::resource('emprunts', EmpruntController::class);

    // Déconnexion
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Redirection par défaut pour les utilisateurs non authentifiés vers la page de connexion
Route::get('/', function () {
    return redirect()->route('login.form');
});
use App\Models\Historique;

Route::get('/historiques', function () {
    $historiques = Historique::with('livre', 'user')->latest()->paginate(10);
    return view('historiques.index', compact('historiques'));
})->middleware('auth');



Route::get('/historiques', [HistoriqueController::class, 'index'])->name('historiques.index');
