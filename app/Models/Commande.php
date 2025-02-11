<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Commande extends Model
{
    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function produits() {
        return $this->belongsToMany(Produit::class)
            ->withPivot('qte_cmd')
            ->withTimestamps();
    }
    protected $casts = [
        'date' => 'datetime',
    ];
}
  


