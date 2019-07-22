<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonCommande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('boncommandes', function (Blueprint $table) {
           $table->string('id')->primary('id')->not_null();
            $table->string('id_fournisseur')->nullable($value = true);
            $table->foreign('id_fournisseur')->references('id')->on('fournisseurs');
            $table->text('description');
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
        Schema::dropIfExists('boncommandes');
    }
}
