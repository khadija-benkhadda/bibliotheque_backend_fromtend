<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 30);
            $table->unsignedInteger('annee')->default(date('Y'));
            $table->text('description')->nullable();
            $table->string('realisateur', 50);
            $table->unsignedInteger('duree');
            $table->decimal('note', 3, 1)->nullable();
            $table->string('genre', 20);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('films');
    }
};
