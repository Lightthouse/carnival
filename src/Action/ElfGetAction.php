<?php

namespace ESoft\Action;

use ESoft\Model\Elf;
use ESoft\Model\Gem;
use ESoft\Model\Gnome;
use ESoft\Model\Preference;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Validation\ValidationException;

class ElfGetAction
{
    public const POST_CHANGE_PREFER = 'prefer_form';
    public const POST_CHANGE_CONFIRM = 'confirm_form';
    public const POST_CHANGE_SETTINGS = 'settings_form';

    public function __construct($validator){
        $this->validator = $validator;
    }

    public function __invoke(ServerRequest $request){
        $id = $request->getAttribute('id');
        $preferences_sum_error = false;

        $bag = new \Illuminate\Support\MessageBag();

        if(ctype_digit ($id)){
            session_start();
            $gnome_access = isset($_SESSION['gnome_id']) ;
            $elf_access = isset($_SESSION['elf_id']);

            if (!$gnome_access && !$elf_access){
                header('Location: /signIn');
                exit();
            }
            $change_opportunity = false;

            $elf = Elf::find($id);
            $gnome = ($_SESSION['gnome_id'] == 0) ? null:Gnome::find($_SESSION['gnome_id'])->master_gnome ;

            if($_SESSION['elf_id'] == $id){
                $change_opportunity = 'elf';
            }
            elseif($gnome != null){
                $change_opportunity = 'master_gnome';
            }

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
              elseif (array_key_exists(self::POST_CHANGE_SETTINGS,$data)){
                  unset($data[self::POST_CHANGE_SETTINGS]);
                  $bag = new \Illuminate\Support\MessageBag();
                  try{
                      $this->validator->validate($data,[
                          'email' =>['required','email','unique:gnomes,email','unique:elves,email'],
                      ]);

                      $elf->name = $data['fullName'];
                      $elf->email= $data['email'];
                      $elf->update();

                  }
                  catch (ValidationException $exception){
                      $bag = $exception->validator->errors();
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
                'change_opportunity' => $change_opportunity,
                'errors' => $bag
            ]);
        }
        else{
            return view('not_found');
        }

    }
}
