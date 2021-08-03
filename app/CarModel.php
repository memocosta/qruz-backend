<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarModel extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function make()
    {
        return $this->belongsTo(CarMake::class);
    }
}
