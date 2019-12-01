<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Monday
            $table->bigInteger('monday_morning')->nullable();
            $table->bigInteger('monday_afternoon')->nullable();
            $table->bigInteger('monday_evening')->nullable();
            // Tuesday
            $table->bigInteger('tuesday_morning')->nullable();
            $table->bigInteger('tuesday_afternoon')->nullable();
            $table->bigInteger('tuesday_evening')->nullable();
            // Wednesday
            $table->bigInteger('wednesday_morning')->nullable();
            $table->bigInteger('wednesday_afternoon')->nullable();
            $table->bigInteger('wednesday_evening')->nullable();
            // Thursday
            $table->bigInteger('thursday_morning')->nullable();
            $table->bigInteger('thursday_afternoon')->nullable();
            $table->bigInteger('thursday_evening')->nullable();
            // Friday
            $table->bigInteger('friday_morning')->nullable();
            $table->bigInteger('friday_afternoon')->nullable();
            $table->bigInteger('friday_evening')->nullable();
            // Saturday
            $table->bigInteger('saturday_morning')->nullable();
            $table->bigInteger('saturday_afternoon')->nullable();
            $table->bigInteger('saturday_evening')->nullable();
            // Sunday
            $table->bigInteger('sunday_morning')->nullable();
            $table->bigInteger('sunday_afternoon')->nullable();
            $table->bigInteger('sunday_evening')->nullable();

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
        Schema::dropIfExists('schedules');
    }
}
