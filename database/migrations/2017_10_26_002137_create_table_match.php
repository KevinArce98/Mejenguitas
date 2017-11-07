<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id');
             $table->string('name');
             $table->integer('players');
             $table->integer('price');
             $table->time('hour');
             $table->date('date');
             $table->string('site');
             $table->double('lat');
             $table->double('lng');
             $table->longText('info')->nullable();
            $table->timestamps();

              $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
