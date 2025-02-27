<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'type', 'price', 'status'];

    // Accessor to format the price
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', ' ') . ' €';
    }

    // Mutator to ensure name is always uppercase
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}

