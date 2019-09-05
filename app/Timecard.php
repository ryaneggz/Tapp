<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timecard extends Model
{
    
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    
    public function summary()
    {
        return $this->belongsTo('App\Summary');
    }
}
