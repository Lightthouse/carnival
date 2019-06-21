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
        $post_request_error =false;

        if( $request->getMethod() == 'POST'){
            $data = $request->getParsedBody();

            if(array_key_exists(self::DISTRIBUTE_FORM,$data)){
                if($data['distribute_preference'] + $data['distribute_mood'] + $data['distribute_count'] != 100){
                    $post_request_error = 'сумма процентов распределения должна быть 100%';
                }
                else{

                    $gems_amount = count($gems_no_elf);

                    $preferenceDist = round($gems_amount * $data['distribute_preference'] / 100);
                    $moodDist = round($gems_amount * $data['distribute_mood'] / 100);
                    $equalDist = $gems_amount - ($preferenceDist + $moodDist);

                    Distribution::preferenceDist($preferenceDist);
                    Distribution::moodDist($moodDist);
                    Distribution::equalDist($equalDist);
                }


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
                return view('not_found');
            }

        }
        $gems_no_elf = Gem::where('elf_id','=',null)->get();
        $gems_no_confirm = Gem::where([['elf_id','<>',null],['confirmed_at','=',null]])->get();

        return view('gem_distribute',[
            'gems_no_elf' => $gems_no_elf,
            'gems_no_confirm' => $gems_no_confirm,
            'elves' => $elves,
            'post_request_error' => $post_request_error
        ]);
    }
}
