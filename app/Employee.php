<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function timecard()
    {
        return $this->hasMany('App\Timecard');
    }

    public function summary()
    {
        return $this->hasMany('App\Summary');
    }

    public function cards()
    {
        return $this->hasMany('App\Cards');
    }

    public function reports()
    {
        return $this->hasMany('App\Report');
    }
}
