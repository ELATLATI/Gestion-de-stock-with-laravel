<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineDevis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linedevis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_devi');
            $table->foreign('id_devi')->references('id')->on('devis') ->onDelete('cascade');
            $table->string('id_produit');
            $table->foreign('id_produit')->references('id')->on('produits');
            $table->integer('quantite');
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
        Schema::dropIfExists('linedevis');
    }
}
