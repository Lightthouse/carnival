<?php

namespace ESoft\Model;

use Illuminate\Database\Eloquent\Model;

class Gnome extends Model
{
    public function gems()
    {
        return $this->hasMany(Gem::class);
    }
}
