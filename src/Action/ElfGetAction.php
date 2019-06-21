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
        $preferences_sum_error = false;

        if(ctype_digit ($id)){
            $preferences = \ESoft\Model\Preference::where('elf_id','=',$id)->get();
            $data = $request->getParsedBody();

            if($request->getMethod() == 'POST') {

              if(array_key_exists(self::POST_CHANGE_PREFER,$data)){
                  unset($data[self::POST_CHANGE_PREFER]);
                  if(array_sum ($data) != 100){
                      $preferences_sum_error = 'сумма предпочтений должна быть 100%';
                  }
                  else{
                      foreach($preferences as $prefer){
                          $prefer->prefer = $data[$prefer->parameter->name];
                          $prefer->update();
                      }
                  }

              }
              elseif (array_key_exists(self::POST_CHANGE_CONFIRM,$data)){
                 unset($data[self::POST_CHANGE_CONFIRM]);
                  foreach(array_keys($data) as $gem){
                      $confirm = Gem::find($gem);
                      $confirm->confirmed_at = date("Y-m-d H:i:s");
                      $confirm->update();
                  }
                }
              else{
                  return view('not_found');
              }

            }
            $elf = Elf::find($id);
            $unconfirmed_gems = Gem::where([['elf_id','=',$id],['confirmed_at','=',null]])->get();
            $confirmed_gems = Gem::where([['elf_id','=',$id],['confirmed_at','<>',null]])->get();

            return view('elf_get',[
                'elf' => $elf,
                'preferences' => $preferences,
                'unconfirmed_gems' => $unconfirmed_gems,
                'confirmed_gems' => $confirmed_gems,
                'preferences_sum_error' => $preferences_sum_error,
            ]);
        }
        else{
            return view('not_found');
        }

    }
}
