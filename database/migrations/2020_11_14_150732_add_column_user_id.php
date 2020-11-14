<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            //
            $table->integer('user_id')->unsigned()->after('id'); //field declaration

            $table->foreign('user_id')->references('id')->on('users'); // foreginkey for user_id that referenced to id in table of users


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolios', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            //
        });
    }
}
