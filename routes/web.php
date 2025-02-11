<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TestController;


Route::get('/',function(){
    return view("welcome");
});

// Regroupe toutes les routes de blog sous un même préfixe
//Route::prefix('blog')->group(function () {
   // Route::get('/', function (Request $request) {
      //  $post = new Exemple();
      //  $post->title = "Mon premier article";
      //  $post->slug = "mon-premier-slug";
      //  $post->content = "Mon contenu";
      //  $post->save();

      //  return [
        //    "link" => route('blog.show', ['slug' => "mon-premier-slug", 'id' => 5])
        //];
   // })->name('blog.index');

   // Route::get('/{slug}/{id}', function (string $slug, string $id) {
      //  return [
      //      "slug" => $slug,
       //     "id" => $id
       // ];
   // })->where([
      //  'id' => '[0-9]+' // Correction de la validation (accepte plusieurs chiffres)
  //  ])->name('blog.show');
//});

Route::get('/show', function () {
    return view("Show");
});
Route::resource('commandes', CommandeController::class);
Route::get('commandes/{commande}/details', [CommandeController::class, 'show'])->name('commandes.show');
Route::get('/search', [CommandeController::class, 'search'])->name('commandes.search');
Route::get('/',function(){
    return "bonjour laravel";
});
Route::get('/acceil',function(){
    return view('acceil');
});
Route::get('/test', [TestController::class, 'index']);
Route::get('/acceil', [TestController::class, 'show']);
Route::view('/acceil','acceil')->name('accueil');
Route::view('/test','test');
Route::get('/home/{name}/{age?}',function($name,$age=null){
    if($age){
    return "bonjour $name cv votre age est:$age";}else{
        return "bonjour $name";
    }

});
//Route::get('/acceiln',function(){
  //  return view('acceiln');
//})->middleware('age');
//Route::get("/acceil",function(){
   // return view("acceil");
//})->middleware("name");

Route::get('/test', function () {
    return view('test');
})->middleware('test');

Route::get('/acceil',[TestController::class,'index']);
use App\Http\Controllers\CommandeController;
Route::get('/commandes', [CommandeController::class, 'index']);
