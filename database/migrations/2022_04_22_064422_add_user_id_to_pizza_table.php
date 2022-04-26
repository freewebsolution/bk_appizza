<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPizzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('pizza','user_id')){

        }else{
            Schema::table('pizza', function (Blueprint $table) {
                $table->integer('user_id')->nullable();
            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pizza', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
