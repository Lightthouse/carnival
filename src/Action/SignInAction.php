<?php

namespace ESoft\Action;

use ESoft\Model\Elf;
use ESoft\Model\Gnome;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Validation\ValidationException;
use ESoft\Hash\HashInterface;

class SignInAction
{
    protected $hash;
    protected $validator;

    public function __construct(HashInterface $hash, $validator){
        $this->hash = $hash;
        $this->validator = $validator;
    }

    public function __invoke(ServerRequest $request){
        $data = [];
        $bag = new \Illuminate\Support\MessageBag;

        if($request->getMethod() == 'POST'){
            $data = $request->getParsedBody();


            try{

                $this->validator->validate(
                    $data,
                    [
                        'email' => ['required','email'],
                        'password' => ['required','min:3']
                    ]);

                $elf = Elf::where('email', '=',$data['email'] )->get()->first();
                $gnome = Gnome::where('email', '=',$data['email'] )->get()->first();

                if($elf != null){
                    if($this->hash->verify($data['password'],$elf->password)){
                        session_start();
                        unset($_SESSION ['elf_id'],$_SESSION ['gnome_id']);
                        //$elf_arr =['elf',$elf->id];
                        $_SESSION ['elf_id']=$elf->id;
                        $_SESSION ['gnome_id']=0;
                        header('Location: /elves/'.$elf->id);
                        exit();
                    }
                    else{
                        $data['wrong_data'] = 'неверные данные';
                    }
                }
                elseif ($gnome != null){
                    if($this->hash->verify($data['password'],$gnome->password)){
                        session_start();
                        unset($_SESSION ['elf_id'],$_SESSION ['gnome_id']);
                        //$gnome_arr =['gnome',$gnome->id];
                        $_SESSION ['gnome_id']=$gnome->id;
                        $_SESSION ['elf_id']=0;
                        header('Location: /gemsAdd');
                        exit();
                    }
                    else{
                        $data['wrong_data'] = 'неверные данные';
                    }
                }
                else{
                    $data['wrong_data'] = 'неверные данные';
                }


            }
            catch(ValidationException $exception){
                $bag = $exception->validator->errors();
            }
        }

        if(isset($_GET['logout'])){
            session_start();
            unset($_SESSION ['elf_id'],$_SESSION ['gnome_id']);
        }

        return view('sign_in',[
            'errors' => $bag,
            'data' => $data
        ]);
    }
}
