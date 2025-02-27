<?php
namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {
    public function showInscription() {
        return view('auth.inscription');
    }

    public function register(Request $request) {
        $request->validate([
            'login' => 'required|unique:comptes',
            'mot_passe' => 'required|min:3',
        ]);

        $compte = Compte::create([
            'login' => $request->login,
            'mot_passe' => $request->mot_passe,
        ]);

        Session::put('compte', $compte);
        return redirect()->route('profil');
    }

    public function showConnexion() {
        return view('auth.connexion');
    }

    public function login(Request $request) {
        $request->validate([
            'login' => 'required',
            'mot_passe' => 'required',
        ]);

        $compte = Compte::where('login', $request->login)->first();

        if ($compte && Hash::check($request->mot_passe, $compte->mot_passe)) {
            Session::put('compte', $compte);
            return redirect()->route('profil');
        } else {
            return back()->withErrors(['login' => 'Identifiants incorrects.']);
        }
    }

    public function profil() {
        $compte = Session::get('compte');

        if (!$compte) {
            return redirect()->route('connexion');
        }

        if ($compte->profil === 'admin') {
            $clients = Compte::where('profil', 'client')->get();
            return view('auth.admin_profil', compact('clients'));
        }

        return view('auth.client_profil', compact('compte'));
    }

    public function logout() {
        Session::forget('compte');
        return redirect()->route('connexion');
    }
}
