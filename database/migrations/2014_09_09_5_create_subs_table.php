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
            // mediumInteger => max 16777215
            // 4h movie 60 fps => 864000
            $table->mediumInteger('frame')->unsigned();
            $table->text('original');
            $table->text('translated');
            $table->enum('status', [
                'original',
                'translated',
                'checked',
                'wrong',
                'locked'
            ]);
            $table->boolean('timed');
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
