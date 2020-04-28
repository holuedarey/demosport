<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGametypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gametype', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('wining_price');
            $table->string('entry_price');
            $table->string('questions_count');
            // $table->string('image');
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
        Schema::dropIfExists('gametype');
    }
}
