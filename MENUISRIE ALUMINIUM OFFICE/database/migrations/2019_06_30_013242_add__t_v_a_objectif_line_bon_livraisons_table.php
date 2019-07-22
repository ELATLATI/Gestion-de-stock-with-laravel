<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTVAObjectifLineBonLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('linebonlivraisons', function (Blueprint $table) {
             $table->dropColumn('TVA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('linebonlivraisons', function (Blueprint $table) {
             $table->dropColumn('TVA');
        });
    }
}
