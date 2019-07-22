<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineBonLivraison extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linebonlivraisons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_bonlivraison');
            $table->foreign('id_bonlivraison')->references('id')->on('bonlivraisons') ->onDelete('cascade');
            $table->string('id_produit');
            $table->foreign('id_produit')->references('id')->on('produits');
            $table->integer('quantite');
             $table->string('TVA')->default('20%');
            $table->integer('HT')->nullable($value = true);
            $table->float('totale')->nullable($value = true);
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
        Schema::dropIfExists('linebonlivraisons');
    }
}
