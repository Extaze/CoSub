<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomMembersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_members', function ($table) {
            $table->increments('id');
            $table->integer('user')->unsigned();
            $table->integer('room')->unsigned();
            $table->integer('rights')->unsigned();
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users');
            $table->foreign('room')->references('id')->on('rooms');
            $table->foreign('rights')->references('id')->on('room_rights');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_members');
    }

}
