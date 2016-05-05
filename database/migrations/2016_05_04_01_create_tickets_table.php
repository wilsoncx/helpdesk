<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('description');
            $table->string('priority');
            $table->string('subject');
            $table->timestamps();
            $table->timestamp('closed_at');
            $table->integer('request_id')->unsigned();
            $table->foreign('request_id')->references('id')->on('users');
            $table->integer('analyst_id')->unsigned();
            $table->foreign('analyst_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');

    }
}
