<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaCartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_cartas', function (Blueprint $table) {
            $table->foreignId('CartaID')
                ->constrained('cartas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('ArtistaID')
                ->constrained('artistas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artista_cartas');
    }
}
