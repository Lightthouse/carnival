<?php

namespace ESoft\Model;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
    public function elf()
    {
        return $this->belongsTo(Elf::class);
    }

    public static function set_elf(Elf $elf){
        $gems = Parameter::all();
        $prefer_percent = 100/count($gems); // not accurate

        foreach($gems as $gem){
            $pref = new Preference();
            $pref->elf_id = $elf->id;
            $pref->parameter_id = $gem->id;
            $pref->prefer = $prefer_percent;
            $pref->save();
        }
    }
}
