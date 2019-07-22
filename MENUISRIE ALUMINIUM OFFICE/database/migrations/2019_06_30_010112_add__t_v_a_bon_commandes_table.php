<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTVABonCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boncommandes', function (Blueprint $table) {
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
        Schema::table('boncommandes', function (Blueprint $table) {
             $table->dropColumn('TVA');
        });
    }
}
