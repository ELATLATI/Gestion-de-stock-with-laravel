<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->integer('id')->primary('id')->not_null();
            $table->integer('id_famille')->unsigned();
            $table->foreign('id_famille')->references('id_famille')->on('familles');
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id_category')->on('categorys');
            $table->string('id_fournisseur');
            $table->foreign('id_fournisseur')->references('id')->on('fournisseurs');
            $table->string('produit');
            $table->string('description');
            $table->float('prix_achat');
            $table->float('prix_vente');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
