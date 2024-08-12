<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSixHatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('six_hats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('information');
            $table->text('emotions');
            $table->text('discernment');
            $table->text('optimisticResponse');
            $table->text('creativity');
            $table->text('overview');
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
        Schema::dropIfExists('six_hats');
    }
}

