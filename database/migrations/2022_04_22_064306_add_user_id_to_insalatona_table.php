<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToInsalatonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('insalatona','user_id')){

        }else{
            Schema::table('insalatona', function (Blueprint $table) {
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
        Schema::table('insalatona', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
