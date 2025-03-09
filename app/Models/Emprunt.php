<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    use HasFactory;

    protected $fillable = ['livre_id', 'date_emprunt', 'date_retour'];

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }
}
