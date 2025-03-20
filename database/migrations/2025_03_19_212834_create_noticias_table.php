<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Título de la noticia
            $table->text('link'); // URL de la noticia
            $table->timestamp('fecha'); // Fecha de publicación
            $table->string('clasificacion'); // Positiva, Negativa, Neutral
        });
    }

    public function down()
    {
        Schema::dropIfExists('noticias');
    }
};
