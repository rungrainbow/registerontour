<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('user_profiles');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status_names');
            $table->string('type');
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
        Schema::dropIfExists('user_status');
    }
}
