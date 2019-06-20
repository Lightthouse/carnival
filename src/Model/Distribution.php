<?php


namespace ESoft\Model;


class Distribution
{
    public static function preferenceDist(int $amount){
        $gems = \ESoft\Model\Gem::where('elf_id','=',null)->take($amount)->get();

        foreach ($gems as $gem) {
            $gem_name = $gem->parameter_id;
            $maxPref = \ESoft\Model\Preference::where('parameter_id','=',$gem_name)->max('prefer');
            $prefer = \ESoft\Model\Preference::where([['prefer','=',$maxPref],['parameter_id','=',$gem_name]])->get()->first();
            $gem->elf_id = $prefer->elf_id;
            $gem->save();

        }

    }
    public static function moodDist(int $amount){

        $week_ago = date("Y-m-d H:i:s",time()-60*60*24*7);
        $all_elves = \ESoft\Model\Elf::all()->take($amount);

        foreach($all_elves as $elf){
            $last_time_gem = $elf->gems()->orderBy('created_at', 'desc')->first()->created_at;
            $gem = \ESoft\Model\Gem::where('elf_id','=',null)->first();

           // if (!isset($gem))break;////////////////////////////////////////////////////////

            if ($last_time_gem > $week_ago){
                $gem->elf_id = $elf->id;
                $gem->save();
            }
        }

    }
    public static function equalDist(int $amount){
        $elves = \ESoft\Model\Elf::all();
        $gems = Gem::where('elf_id','=',null)->take($amount)->get();

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
