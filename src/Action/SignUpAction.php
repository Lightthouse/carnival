<?php

namespace ESoft\Action;

use ESoft\Model\Elf;
use ESoft\Model\Gnome;
use ESoft\Model\Preference;
use GuzzleHttp\Psr7\ServerRequest;
use ESoft\Hash\HashInterface;
use ESoft\Randomizer\RandomizerInterface;
use Illuminate\Validation\ValidationException;


class SignUpAction
{
    public $hash;
    public $validator;

    public function __construct(HashInterface $hash, $validator){
        $this->hash = $hash;
        $this->validator = $validator;
    }

    public function __invoke(ServerRequest $request){
        $bag = new \Illuminate\Support\MessageBag();
        $data = [];

        if($request->getMethod() == "POST"){
            $data = $request->getParsedBody();

            if ($data['raceChoice'] == 'gnome'){

                try{
                    $this->validator->validate($data,[
                        'email' =>['required','email','unique:gnomes,email','unique:elves,email'],
                        'password' =>['required','min:3','confirmed'],
                        'password_confirmation' =>['required','min:3']
                    ]);

                    $gnome = new Gnome();
                    $gnome->name = $data['first_name'].' '.$data['last_name'];
                    $gnome->password = $this->hash->hash($data['password']) ;
                    $gnome->email = $data['email'];
                    $gnome->created_at = date('Y-m-d H:i:s');
                    $gnome->save();
                    header('Location: /');
                }
                catch (ValidationException $exception){
                    $bag = $exception->validator->errors();
                }

            }

            else{

                try{
                    $this->validator->validate($data,[
                        'email' =>['required','email','unique:gnomes,email','unique:elves,email'],
                        'password' =>['required','min:3','confirmed'],
                        'password_confirmation' =>['required','min:3']
                    ]);

                    $elf = new Elf();
                    $elf->name = $data['first_name'].' '.$data['last_name'];
                    $elf->password = $this->hash->hash($data['password']) ;
                    $elf->email = $data['email'];
                    $elf->created_at = date('Y-m-d H:i:s');
                    $elf->save();

                   Preference:: set_elf($elf);
                    header('Location: /');
                }
                catch (ValidationException $exception){
                    $bag = $exception->validator->errors();
                }

            }

        }
        return view('sign_up',[
            'errors' => $bag,
            'data' => $data
        ]);
    }
}
