<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manaCost')->nullable();
            $table->integer('cmc')->nullable();
            $table->string('color')->nullable();
            $table->string('colorIdentity')->nullable();
            $table->string('supertypes')->nullable();
            $table->string('types');
            $table->string('subtypes')->nullable();
            $table->string('rarity');
            $table->string('set_id');
            $table->string('text', 2000)->nullable();
            $table->string('originalText', 2000)->nullable();
            $table->string('flavor', 2000)->nullable();
            $table->string('artist_id')->nullable();
            $table->string('number')->nullable();
            $table->string('power')->nullable();
            $table->string('toughness')->nullable();
            $table->string('layout')->nullable();
            $table->string('multiverse_id')->nullable();
            $table->string('imageURL')->nullable();
            $table->string('id_carta')->nullable();
            $table->string('legalities')->nullable();
            $table->string('nameSearch')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartas');
    }
}
