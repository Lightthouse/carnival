<?php

namespace ESoft\Action;

use ESoft\Model\Elf;
use ESoft\Model\Gem;
use ESoft\Model\Preference;
use GuzzleHttp\Psr7\ServerRequest;

class ElfGetAction
{
    public const POST_CHANGE_PREFER = 'prefer_form';
    public const POST_CHANGE_CONFIRM = 'confirm_form';

    public function __invoke(ServerRequest $request){
        $id = $request->getAttribute('id');

        if(ctype_digit ($id)){
            $preferences = \ESoft\Model\Preference::where('elf_id','=',$id)->get();
            $data = $request->getParsedBody();

            if($request->getMethod() == 'POST') {
                /*
               * TODO
               * data type check
               * data the sum check
               * plural condition
              */
              if(array_key_exists(self::POST_CHANGE_PREFER,$data)){

                  foreach($preferences as $prefer){
                      $prefer->prefer = $data[$prefer->parameter->name];
                      $prefer->update();
                  }
              }
              elseif (array_key_exists(self::POST_CHANGE_CONFIRM,$data)){
                 unset($data[self::POST_CHANGE_CONFIRM]);
                  foreach(array_keys($data) as $gem){
                      $cofirm = Gem::find($gem);
                      $cofirm->confirmed = true;
                      $cofirm->update();
                  }
                }
              else{
                  var_dump('wrong data');
                  exit();
              }

            }
            $elf = Elf::find($id);
            $unconfirmed_gems = Gem::where([['elf_id','=',$id],['confirmed','=','0']])->get();
            $confirmed_gems = Gem::where([['elf_id','=',$id],['confirmed','=','1']])->get();

            return view('elf_get',[
                'elf' => $elf,
                'preferences' => $preferences,
                'unconfirmed_gems' => $unconfirmed_gems,
                'confirmed_gems' => $confirmed_gems
            ]);
        }
        else{
            return view('not_found');
        }

    }
}
