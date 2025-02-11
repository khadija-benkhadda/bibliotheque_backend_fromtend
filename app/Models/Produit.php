<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function commandes()
    {
        return $this->belongsToMany(Commande::class)
                    ->withPivot('qte_cmd')
                    ->withTimestamps();
    }}
