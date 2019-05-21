<?php


namespace ESoft\Model;


use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    public function gems(){
        return $this->hasMany(Gem::class);
    }
}
