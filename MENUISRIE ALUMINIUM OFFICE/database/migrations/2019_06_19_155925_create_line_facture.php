<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineFacture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linefactures', function (Blueprint $table) {
           $table->increments('id');
           $table->string('id_facture');
            $table->foreign('id_facture')->references('id')->on('factures') ->onDelete('cascade');
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
        Schema::dropIfExists('linefactures');
    }
}
