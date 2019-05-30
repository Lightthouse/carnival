<?php

namespace ESoft\Model;

use Illuminate\Database\Eloquent\Model;

class Elf extends Model
{
    public function parameters()
    {
        return $this->belongsToMany(Parameter::class);
    }
}
