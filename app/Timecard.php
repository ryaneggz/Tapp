<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timecard extends Model
{   
    protected $attributes = [
        'time_out' => null,
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
