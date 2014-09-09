<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subs', function ($table) {
            $table->bigIncrements('id');
            $table->integer('room')->unsigned();
            // timecode : 00:00:00,000
            $table->string('timestart', 12);
            $table->string('timeend', 12);
            $table->text('original');
            $table->text('translated');
            $table->timestamps();

            $table->foreign('room')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subs');
    }

}
