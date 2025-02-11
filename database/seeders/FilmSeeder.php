<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            [
                'titre' => 'Inception',
                'annee' => 2010,
                'genre' => 'Science Fiction',
                'duree' => '02:28:00'
            ],
            [
                'titre' => 'The Dark Knight',
                'annee' => 2008,
                'genre' => 'Action',
                'duree' => '02:32:00'
            ],
            [
                'titre' => 'Titanic',
                'annee' => 1997,
                'genre' => 'Romance',
                'duree' => '03:15:00'
            ]
        ]);
        
    }
}
