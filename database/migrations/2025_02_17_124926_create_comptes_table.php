<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
   
   public function up()
{
    Schema::create('comptes', function (Blueprint $table) {
        $table->id();
        $table->string('login')->unique();
        $table->string('mot_passe');
        $table->enum('profil', ['client', 'admin']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptes');
    }
}
