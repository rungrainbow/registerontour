<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('user_profiles');
            $table->string('file_name');
            $table->string('directory');
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
        Schema::dropIfExists('user_files');
    }
}
