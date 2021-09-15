<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_id');
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('position');
            $table->longText('target')->nullable();
            $table->json('education')->nullable();
            $table->json('experience')->nullable();
            $table->longText('interests')->nullable();
            $table->json('skill')->nullable();
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
        Schema::dropIfExists('cv_users');
    }
}
