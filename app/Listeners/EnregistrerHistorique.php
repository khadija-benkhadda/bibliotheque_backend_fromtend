<?php

namespace App\Listeners;

use App\Events\LivreModifie;
use App\Models\Historique; // 🔹 Vérifiez que ce modèle est bien importé
use Illuminate\Support\Facades\Auth;

class EnregistrerHistorique
{
    public function handle(LivreModifie $event)
    {
        Historique::create([
            'livre_id' => $event->livre->id,
            'user_id' => Auth::id(),
            'action' => $event->action,
            'details' => json_encode($event->details),
        ]);
    }
}
