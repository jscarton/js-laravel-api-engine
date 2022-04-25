<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
	const TABLE_NAME = 'projects';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::TABLE_NAME, function (Blueprint $table) {
			$table->uuid('project_id');
			$table->uuid('user_id');
			$table->string('slug')->unique();
			$table->string('name');			
			$table->text('description');
			$table->json('database_settings');
			$table->json('project_settings');
			$table->json('event_settings');
			$table->primary('project_id');
			$table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(static::TABLE_NAME);
    }
}
