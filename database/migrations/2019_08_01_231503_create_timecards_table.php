<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimecardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timecards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id');
            $table->integer('time_in');
            $table->integer('time_out');
            $table->integer('total_time');
            $table->longText('shift_summary')->nullable();;
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
        Schema::dropIfExists('timecards');
    }

     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
