<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $table = "stagiaires";
    protected $fillable = ['nom', 'prenom', 'email', 'date_naissance', 'note','group_id'];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
