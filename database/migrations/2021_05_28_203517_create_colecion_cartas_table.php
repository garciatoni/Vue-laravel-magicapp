<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColecionCartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colecion_cartas', function (Blueprint $table) {
            $table->foreignId('CartaID')
                ->constrained('cartas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('ColecionID')
                ->constrained('coleciones')
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
        Schema::dropIfExists('colecion_cartas');
    }
}
