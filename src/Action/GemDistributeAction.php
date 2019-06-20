<?php


namespace ESoft\Action;

use ESoft\Model\Distribution;
use ESoft\Model\Elf;
use ESoft\Model\Gem;
use GuzzleHttp\Psr7\ServerRequest;

class GemDistributeAction
{
    public const DISTRIBUTE_FORM = 'distribute_form';
    public const CHANGE_ELF_FORM = 'change_elf_form';

    public function __invoke(ServerRequest $request){

        $gems_no_elf = Gem::where('elf_id','=',null)->get();
        $gems_no_confirm = Gem::where([['elf_id','<>',null],['confirmed_at','=',null]])->get();
        $elves = Elf::all();

        if( $request->getMethod() == 'POST'){
            $data = $request->getParsedBody();

            if(array_key_exists(self::DISTRIBUTE_FORM,$data)){
                $gems_amount = count($gems_no_elf);

                $preferenceDist = $gems_amount * $data['distribute_preference'] / 100;
                $moodDist = $gems_amount * $data['distribute_mood'] / 100;
                $equalDist = $gems_amount * $data['distribute_count'] / 100;

                $arr = [
                    'preferenceDist'=>$preferenceDist,
                    'moodDist'=>$moodDist,
                    'equalDist'=>$equalDist,
                ];
                var_dump($arr);
                exit();
               /*
               Distribution::preferenceDist(1);
               Distribution::moodDist(1);
               Distribution::equalDist(1);
               */

            }
            elseif(array_key_exists(self::CHANGE_ELF_FORM,$data)){
                unset($data[self::CHANGE_ELF_FORM]);
                foreach($gems_no_confirm as $gem){
                    if($data[$gem->id] != ''){
                        $gem_update = Gem::find($gem->id);
                        $gem_update->elf_id = $data[$gem->id];
                        $gem_update->update();
                    }
                }
            }
            else{
                var_dump('wrong data');
                exit();
            }

        }
        $gems_no_confirm = Gem::where([['elf_id','<>',null],['confirmed_at','=',null]])->get();

        return view('gem_distribute',[
            'gems_no_elf' => $gems_no_elf,
            'gems_no_confirm' => $gems_no_confirm,
            'elves' => $elves
        ]);
    }
}
