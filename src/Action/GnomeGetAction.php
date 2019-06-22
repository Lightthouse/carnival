<?php


namespace ESoft\Action;

use ESoft\Hash\HashInterface;
use ESoft\Model\Gem;
use ESoft\Model\Gnome;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Validation\ValidationException;

class GnomeGetAction
{

    public function __construct($validator){
        $this->validator = $validator;
    }

    public function __invoke(ServerRequest $request){
        $id = $request->getAttribute('id');
        $bag = new \Illuminate\Support\MessageBag();

        if(ctype_digit ($id)){

            session_start();
            $gnome_access = isset($_SESSION['gnome_id']) ;
            $elf_access = isset($_SESSION['elf_id']);

            if (!$gnome_access && !$elf_access){
                header('Location: /signIn');
                exit();
            }
            $gnome = Gnome::find($id);
            $change_opportunity = false;

            if($_SESSION['gnome_id'] != 0){
                $master_gnome = Gnome::find($_SESSION['gnome_id'])->master_gnome;
                if( ($master_gnome !=null) || ($_SESSION['gnome_id'] == $id) ){
                    $change_opportunity = true;
                }
            }


            if($request->getMethod() == 'POST'){
                $data = $request->getParsedBody();

                try{
                    $this->validator->validate($data,[
                        'email' =>['required','email','unique:gnomes,email','unique:elves,email'],
                    ]);

                    $gnome->name = $data['fullName'];
                    $gnome->email= $data['email'];
                    $gnome->master_gnome = isset($data['master-check']);
                    $gnome->update();

                    $gnome = Gnome::find($id);
                }
                catch (ValidationException $exception){
                    $bag = $exception->validator->errors();
                }

            }

            return view('gnome_get',[
                'gnome' => $gnome,
                'change_opportunity' => $change_opportunity,
                'errors' => $bag
            ]);
        }
        else{
            return view('not_found');
        }

    }
}
