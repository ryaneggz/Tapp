<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('body');
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
        Schema::dropIfExists('summaries');
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

     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function timecard()
    {
        return $this->belongsTo('App\Timecard');
    }
}
