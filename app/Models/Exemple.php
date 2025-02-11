<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exemple extends Model
{
    use HasFactory;
    protected $table = 'exemple'; // Assure-toi que le nom correspond à ta table

    protected $fillable = ['title', 'slug', 'content']; // Ajoute les champs autorisés

}
