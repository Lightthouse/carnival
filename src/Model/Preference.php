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
        $count_gems = count($gems);
        $prefer_percent = 100/$count_gems;
        $last_pref = 100 - round($prefer_percent) * ($count_gems - 1);

        foreach($gems as $gem){
            $pref = new Preference();
            $pref->elf_id = $elf->id;
            $pref->parameter_id = $gem->id;

            if($count_gems > 1 ){$pref->prefer = $prefer_percent;}
            else{$pref->prefer = $last_pref;}

            $pref->save();
            $count_gems = $count_gems - 1;
        }
    }
}
