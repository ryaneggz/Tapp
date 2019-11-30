<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
