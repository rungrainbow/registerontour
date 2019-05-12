<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCamp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_camps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('user_profiles');
            $table->string('name');
            $table->string('organizer');
            $table->string('comment');
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
        Schema::dropIfExists('user_camps');
    }
}
