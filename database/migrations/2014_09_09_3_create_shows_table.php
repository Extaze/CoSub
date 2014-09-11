<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('shows', function ($table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('network', 100);
            $table->timestamp('started_at');
            // Null -> still going
            $table->timestamp('ended_at')->nullable();
            $table->smallInteger('duration');
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
		Schema::dropIfExists('shows');
	}

}
