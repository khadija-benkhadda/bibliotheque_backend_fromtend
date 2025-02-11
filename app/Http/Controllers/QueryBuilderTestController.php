<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderTestController extends Controller
{
    public function testQueries()
    {

         DB::table('test_table')->updateOrInsert(
             ['email' => 'test1@gmail.com'], 
           ['name' => 'test1', 'age' => 25]
         ); 
        DB::table('test_table')->updateOrInsert(
            ['email' => 'test2@gmail.com'], 
            ['name' => 'test2', 'age' => 30]
        );
        DB::table('test_table')->updateOrInsert(
            ['email' => 'test3@gmail.com'], 
            ['name' => 'test3', 'age' => 22]
        );
        DB::table('test_table')->updateOrInsert(
            ['email' => 'test4@gmail.com'], 
            ['name' => 'test4', 'age' => 28]
        );


        $test1 = DB::table('test_table')->where('email', 'test1@gmail.com')->value('id');
        $test2 = DB::table('test_table')->where('email', 'test2@gmail.com')->value('id');
        $test3 = DB::table('test_table')->where('email', 'test3@gmail.com')->value('id');

        DB::table('another_table')->insert([
            ['test_table_id' => $test1, 'details' => 'Details for test1'],
            ['test_table_id' => $test2, 'details' => 'Details for test2'],
            ['test_table_id' => $test3, 'details' => 'Details for test3'],
        ]);


        $results = [];

        // 1. get, select, distinct
        $results['get'] = DB::table('test_table')->get();
        $results['select'] = DB::table('test_table')->select('name', 'email')->get();
        $results['distinct'] = DB::table('test_table')->select('age')->distinct()->get();

        // 2. where, orWhere, whereIn, whereBetween, whereNull
        $results['where'] = DB::table('test_table')->where('age', '>', 25)->get();
        $results['orWhere'] = DB::table('test_table')->where('age', '>', 25)->orWhere('name', 'test1')->get();
        $results['whereIn'] = DB::table('test_table')->whereIn('age', [22, 28])->get();
        $results['whereBetween'] = DB::table('test_table')->whereBetween('age', [20, 30])->get();
        $results['whereNull'] = DB::table('test_table')->whereNull('updated_at')->get();

        // 3. orderBy, inRandomOrder
        $results['orderBy'] = DB::table('test_table')->orderBy('age', 'desc')->get();
        $results['inRandomOrder'] = DB::table('test_table')->inRandomOrder()->get();

        // 4. latest, oldest, first (Trier les données par date de création)
        $results['latest'] = DB::table('test_table')->latest()->first();
        $results['oldest'] = DB::table('test_table')->oldest()->first();
        $results['first'] = DB::table('test_table')->first();
        

        // 5. find
        $results['find'] = DB::table('test_table')->find(1);

        // 6. count, max, min, avg, sum
        $results['count'] = DB::table('test_table')->count();
        $results['max'] = DB::table('test_table')->max('age');
        $results['min'] = DB::table('test_table')->min('age');
        $results['avg'] = DB::table('test_table')->avg('age');
        $results['sum'] = DB::table('test_table')->sum('age');

        // 7. limit, take, skip, offset
        $results['limit'] = DB::table('test_table')->limit(2)->get();
        $results['take'] = DB::table('test_table')->take(2)->get();
        $results['skip'] = DB::table('test_table')->skip(1)->take(2)->get();
        $results['offset'] = DB::table('test_table')->offset(1)->limit(2)->get();

        //8. insert, insertGetId, update, updateOrInsert, delete
        
        $results['insertGetId'] = DB::table('test_table')->insertGetId(['name' => 'Khadija', 'age' => 20, 'email' => 'ckh@gmail.com']);
        $results['update'] = DB::table('test_table')->where('id', 1)->update(['age' => 26]);
        $results['updateOrInsert'] = DB::table('test_table')->updateOrInsert(
            ['email' => 'charlie@gmail.com'],
            ['age' => 46]
            
        );
        $results['delete'] = DB::table('test_table')->where('id', 3)->delete();

        // 9. join, leftJoin, rightJoin
        $results['join'] = DB::table('test_table')
            ->join('another_table', 'test_table.id', '=', 'another_table.test_table_id')
            ->get();

        // 10. groupBy, havingRaw, selectRaw
        $results['groupBy'] = DB::table('test_table')
            ->select('age', DB::raw('count(*) as total'))
            ->groupBy('age')
            ->get();
        $results['havingRaw'] = DB::table('test_table')
            ->select('age', DB::raw('count(*) as total'))
            ->groupBy('age')
            ->havingRaw('count(*) > 1')
            ->get();
        $results['selectRaw'] = DB::table('test_table')
            ->selectRaw('age, count(*) as total')
            ->groupBy('age')
            ->get();

        // // 11. union
        $results['union'] = DB::table('test_table')
            ->select('name')
            ->union(DB::table('test_table2')->select('name'))
            ->get();

        return response()->json($results);
    }
}