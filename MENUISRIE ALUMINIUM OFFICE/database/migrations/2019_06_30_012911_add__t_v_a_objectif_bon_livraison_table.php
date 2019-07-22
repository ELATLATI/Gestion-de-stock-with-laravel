<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTVAObjectifBonLivraisonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bonlivraisons', function (Blueprint $table) {
             $table->text('objectif')->after('id_client');
            $table->string('TVA')->default('20%')->after('objectif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bonlivraisons', function (Blueprint $table) {
            $table->dropColumn('objectif');
            $table->dropColumn('TVA');
        });
    }
}
