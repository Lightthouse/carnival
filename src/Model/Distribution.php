<?php


namespace ESoft\Model;


class Distribution
{
    public static function preferenceDist(){
        $gems = \ESoft\Model\Gem::where('elf_id','=',null)->get();

        foreach ($gems as $gem) {
            $maxPref = \ESoft\Model\Preference::where('parameter_id','=',$gem->parameter_id)->max('prefer');
            $prefer = \ESoft\Model\Preference::where([['prefer','=',$maxPref],['parameter_id','=',$gem->parameter_id]])->get()->first();
            $gem->elf_id = $prefer->elf_id;
            $gem->save();

        }

    }
    public static function moodDist(){
        $gems = \ESoft\Model\Gem::where('elf_id','=',null)->get();

    }
    public static function equalDist(){
        $elves = \ESoft\Model\Elf::all();
        $gems = Gem::where('elf_id','=',null)->get();

        $elves_arr =[];

        foreach ($elves as $elf) {
            $elves_arr[$elf->id] = count($elf->gems);
        }

        foreach ($gems as $gem){
            $index = array_search(min($elves_arr),$elves_arr);
            $gem->elf_id = $index;
            $elves_arr[$index] += 1;
            $gem->save();
        }

    }
}
