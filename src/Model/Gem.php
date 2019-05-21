<?php


namespace ESoft\Model;

use Illuminate\Database\Eloquent\Model;

class Gem extends Model
{
    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
