<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifierDescriptionBonCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boncommandes', function (Blueprint $table) {
              $table->renameColumn('description', 'objectif');
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
              $table->renameColumn('description', 'objectif');
        });
    }
}
