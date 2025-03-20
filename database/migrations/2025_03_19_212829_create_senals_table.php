<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('senals', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timestamp'); // Marca de tiempo de la señal
            $table->string('signal'); // HOLD, BUY o SELL
            $table->decimal('close', 10, 2); // Precio de cierre con 2 decimales
        });
    }

    public function down()
    {
        Schema::dropIfExists('senals');
    }
};
