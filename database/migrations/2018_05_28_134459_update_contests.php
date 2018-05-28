<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContests extends Migration
{

    public function up()
    {
        Schema::table('contests', function (Blueprint $table) {
           $table->dateTime("qualification");
           $table->dateTime("vote");
           $table->dateTime("outcomes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("qualification");
            $table->dropColumn("vote");
            $table->dropColumn("outcomes");
        });
    }
}
