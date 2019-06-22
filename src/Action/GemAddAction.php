<?php

namespace ESoft\Action;

use ESoft\Model\Gem;
use ESoft\Model\Parameter;
use GuzzleHttp\Psr7\ServerRequest;


class GemAddAction
{
    public function __invoke(ServerRequest $request)
    {
        session_start();
        $gnome_access = isset($_SESSION['gnome_id']) ;

        if (!$gnome_access || $_SESSION['gnome_id'] == 0){
            header('Location: /');
            exit();
        }

        $add_success = false;
        if($request->getMethod() == "POST"){
            $data = $request->getParsedBody();
            $gems = Parameter::all();


            foreach ($gems as $gem){
                for($i = 0; $i < $data[$gem->id]; $i++){
                    $new_gem = new Gem();
                    $new_gem->parameter_id = $data[$gem->id];
                    $new_gem->gnome_id = $_SESSION ['gnome_id'];
                    $new_gem->save();
                }
            }
            $add_success = true;
        }

        $gems = Parameter::all();
        return view('gem_add',[
            'gems' => $gems,
            'add_success' => $add_success
        ]);
    }
}
