<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Compte extends Authenticatable {
    use HasFactory;

    protected $table = 'comptes';

    protected $fillable = [
        'login',
        'mot_passe',
        'profil',
    ];

    protected $hidden = [
        'mot_passe',
    ];

    public function setMotPasseAttribute($value) {
        $this->attributes['mot_passe'] = bcrypt($value);
    }
}
