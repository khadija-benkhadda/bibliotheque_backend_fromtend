<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 20);
            $table->string('prenom', 20);
            $table->string('email', 100)->unique();
            $table->string('date_naissance')->nullable();
            $table->string('note')->default(0);
            // $table->string("ville", 50)->nullable();
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
