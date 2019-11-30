<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Employee this Report belongs to
            $table->bigInteger('employee_id')->unsigned()->index();
            // start of pay period
            $table->integer('pay_period_start');
            // end of pay period
            $table->integer('pay_period_end');
            // total amount of hours in pay period
            $table->string('total_hours');
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
        Schema::dropIfExists('reports');
    }
}
