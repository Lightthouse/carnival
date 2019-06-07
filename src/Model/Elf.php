<?php

namespace ESoft\Model;

use Illuminate\Database\Eloquent\Model;

class Elf extends Model
{
    public function preference()
    {
        return $this->hasMany(Preference::class);
    }
    public function gems(){
        return $this->hasMany(Gem::class);
    }

}
