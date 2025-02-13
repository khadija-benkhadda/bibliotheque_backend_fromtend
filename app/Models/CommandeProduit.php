<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    use HasFactory;

    protected $table = 'commande_produit'; // Spécifie le nom de la table pivot
    public $timestamps = false; // Désactiver les timestamps si la table ne contient pas `created_at` et `updated_at`

    protected $fillable = [
        'commande_id',
        'produit_id',
        'qte_cmd',
    ];

    // Relation avec la commande
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }

    // Relation avec le produit
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
