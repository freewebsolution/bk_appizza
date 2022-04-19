<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToVotiUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voti', function (Blueprint $table) {
            $table->unsignedInteger('pizza_id');
            $table->foreign('pizza_id')->references('id')->on('pizza');
            $table->unsignedInteger('insalatona_id');
            $table->foreign('insalatona_id')->references('id')->on('insalatona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voti', function (Blueprint $table) {
            //
        });
    }
}
