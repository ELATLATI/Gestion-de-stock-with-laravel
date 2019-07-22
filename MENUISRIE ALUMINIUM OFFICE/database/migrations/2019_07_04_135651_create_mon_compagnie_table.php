<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonCompagnieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compagnies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Compagnie_nom');
            $table->string('Compagnie_adresse');
            $table->string('Compagnie_telephone');
            $table->string('Compagnie_fax');
            $table->string('Compagnie_ice');
            $table->string('Compagnie_web');
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
        Schema::dropIfExists('compagnies');
    }
}
