<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionBrainstormingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_brainstormings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('stop');
            $table->text('minimize');
            $table->text('keepGoing');
            $table->text('doMore');
            $table->text('start');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('action_brainstormings');
    }
}
