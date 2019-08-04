<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }

     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function timecard()
    {
        return $this->hasMany('App\Timecards');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function cards()
    {
        return $this->hasMany('App\Cards');
    }
}
