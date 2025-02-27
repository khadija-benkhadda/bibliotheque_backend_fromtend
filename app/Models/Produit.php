<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix', 'qte_stock', 'file']; // Ajout de 'file'

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_produit')->withPivot('qte_cmd');
    }

    // Accesseur pour récupérer l'URL complète du fichier
    public function getFileUrlAttribute()
    {
        return $this->file ? Storage::url($this->file) : null;
    }
}
