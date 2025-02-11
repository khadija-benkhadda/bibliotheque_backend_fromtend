<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function test()
    {        
        $results = [];

        // Sélectionnez tous les films de la base de données
        // $results['1.1'] = DB::table('films')->get();

        //Sélectionnez tous les films dans la base de données et affichez leurs titres
        // $results['1.2'] = DB::table('films')->select('titre')->get();
        // $results['1.2'] = DB::table('films')->pluck('titre');
        // $results['1.2'] = DB::table('films')->get('titre');
        // $results['1.2'] = DB::table('films')->get(['titre', 'annee']);



        //Sélectionnez les films sortis après une date spécifique et affichez leurs titres et dates de sortie
        // $Date = '2005';
        // $results['1.3'] = DB::table('films')
        //                     ->where('annee', '>', $Date)
        //                     ->select('titre', 'annee')
        //                     ->get();



        //Sélectionnez tous les acteurs dont le nom commence par "D"
        // $results['1.4'] = DB::table('acteurs')
        //                     ->where('nom', 'LIKE', 'D%')
        //                     ->get();


        // $results['1.4'] = DB::table('acteurs')
        //                     ->where('nom', 'REGEXP', '^D')
        //                     ->get();

        
        //Sélectionnez tous les films dont la durée est supérieure à 120 minutes
        // $results['1.5'] = DB::table('films')
        //             ->where('duree', '>', 120)
        //             ->get();

        
        //Sélectionnez les films sortis entre deux dates spécifiques
        // $startDate = '1999';
        // $endDate = '2020';
        // $results['1.6'] = DB::table('films')
        //                     ->whereBetween('annee', [$startDate, $endDate])
        //                     ->get();
            

        //Insérez un nouveau film dans la base de données avec les informations que vous souhaitez (titre, date de sortie, etc.)
        // $results['2.1'] = DB::table('films')
        //                     ->insert([
        //                         'titre' => 'VC',
        //                         'pays' => 'Morocco',
        //                         'annee' => '2024',
        //                         'duree' => 10,
        //                         'genre' => 'Action',
        //                         'created_at' => now(),
        //                         'updated_at' => now(),
        //                     ]);


        //Insérez plusieurs films en une seule requête
        // $results['2.2'] = DB::table('films')->insert([
        //     [
        //         'titre' => 'Film 1',
        //         'pays' => 'USA',
        //         'annee' => '2021',
        //         'duree' => 110,
        //         'genre' => 'Comédie',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'titre' => 'Film 2',
        //         'pays' => 'UK',
        //         'annee' => '2022',
        //         'duree' => 130,
        //         'genre' => 'Drame',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);


        // Modifiez le titre d'un film existant
        // $results['3.1'] = DB::table('films')
        //                     ->where('id', 1)
        //                     ->update(['titre' => 'Nouveau Titre']);



        //Sélectionnez un film existant, puis mettez à jour son titre et sa description

        // $results['3.2'] = DB::table('films')
        // ->where('id', 1)
        // ->update([
        //     'titre' => 'Titre Mis à Jour',
        //     'genre' => 'Nouveau Genre',
        // ]);


        //Mettez à jour la date de sortie de tous les films sortis avant une date spécifique
        
        // $specificDate = '2000';
        // $results['3.3'] = DB::table('films')
        //                       ->where('annee', '<', $specificDate)
        //                       ->update(['annee' => '2000']);



        // Supprimez un film spécifique de la base de données
        // $results['4.1'] = DB::table('films')->where('id', 1)->delete();


        //Supprimez tous les films sortis avant une date spécifique
        // $specificDate = '1990';
        // $results['4.2'] = DB::table('films')->where('annee', '<', $specificDate)->delete();


        //Calculez le nombre total de films dans la base de données
        // $results['5.1'] = DB::table('films')->count();


        //Calculez la moyenne des durées de tous les films
        // $results['5.2'] = DB::table('films')->avg('duree');
        

        //Calculez la moyenne des années de sortie de tous les films
        // $results['5.3'] = DB::table('films')->avg('annee');
        // $results['5.3'] = DB::table('films')->avg(DB::raw('YEAR(created_at)'));



        //Pour un acteur donné, comptez le nombre de films auxquels il a participé
        // $actorId = 1;
        // $results['5.4'] = DB::table('participations')
        //     ->where('acteur_id', $actorId)
        //     ->count();



        //Affichez les films par page avec une limite de 10 films par page
        // $results['6.1'] = DB::table('films')->paginate(10);


        //Utilisez la pagination pour afficher la deuxième page de résultats
        // $results['6.2'] = DB::table('films')->paginate(10, ['*'], 'page', 2);




        //Sélectionnez tous les films avec les noms de leurs acteurs associés
        // $results['7.1'] = DB::table('films')
        // ->join('participations', 'films.id', '=', 'participations.film_id')
        // ->join('acteurs', 'participations.acteur_id', '=', 'acteurs.id')
        // ->select('films.titre', 'acteurs.nom', 'acteurs.prenom')
        // ->get();



        //Sélectionnez tous les acteurs qui ont participé à un film avec le genre "Action"
        // $results['7.2'] = DB::table('acteurs')
        //     ->join('participations', 'acteurs.id', '=', 'participations.acteur_id')
        //     ->join('films', 'participations.film_id', '=', 'films.id')
        //     ->where('films.genre', 'Action')
        //     ->select('acteurs.nom', 'acteurs.prenom')
        //     ->distinct()
        //     ->get();



        //Sélectionnez le titre du film, le nom de l'acteur et le rôle joué pour chaque participation
        // $results['7.3'] = DB::table('films')
        //                     ->join('participations', 'films.id', '=', 'participations.film_id')
        //                     ->join('acteurs', 'participations.acteur_id', '=', 'acteurs.id')
        //                     ->select('films.titre', 'acteurs.nom', 'acteurs.prenom', 'participations.role')
        //                     ->get();


        //Obtenez la liste des acteurs qui n'ont pas encore participé à un film

        // $results['7.4'] = DB::table('acteurs')
        //                     ->leftJoin('participations', 'acteurs.id', '=', 'participations.acteur_id')
        //                     ->whereNull('participations.film_id')
        //                     ->select('acteurs.nom', 'acteurs.prenom')
        //                     ->get();


        //Sélectionnez les films dont le nombre de participations est supérieur à 3
        // $results['7.5'] = DB::table('films')
        //                     ->join('participations', 'films.id', '=', 'participations.film_id')
        //                     ->select('films.id', 'films.titre')
        //                     ->groupBy('films.id', 'films.titre')
        //                     ->havingRaw('COUNT(participations.acteur_id) > 1')

        //                     ->get();



        // $results['7.5'] = DB::table('films')
        //                     ->join('participations', 'films.id', '=', 'participations.film_id')
        //                     ->selectRaw('films.id, films.titre, COUNT(participations.acteur_id)')
        //                     ->groupBy('films.id', 'films.titre')

        //                     ->get();



        //Sélectionnez les acteurs qui ont participé à des films entre 2010 et 2020
        // $results['7.6'] = DB::table('acteurs')
        //                     ->join('participations', 'acteurs.id', '=', 'participations.acteur_id')
        //                     ->join('films', 'participations.film_id', '=', 'films.id')
        //                     ->whereBetween('films.annee', ['2000', '2020'])
        //                     ->select('acteurs.nom', 'acteurs.prenom')
        //                     ->distinct()
        //                     ->get();


        
        return response()->json($results);


    }   


    
}
