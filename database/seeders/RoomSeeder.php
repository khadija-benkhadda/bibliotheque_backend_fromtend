<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        Room::create([
            'name' => 'Suite Deluxe',
            'type' => 'Suite',
            'price' => 120.50,
            'status' => 'disponible'
        ]);

        Room::create([
            'name' => 'Chambre Standard',
            'type' => 'Standard',
            'price' => 80.00,
            'status' => 'occupé'
        ]);
    }
}

