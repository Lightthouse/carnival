<?php

namespace ESoft\Action;

use ESoft\Model\Gem;
use ESoft\Model\Elf;
use ESoft\Model\Gnome;
use ESoft\Model\Parameter;
use GuzzleHttp\Psr7\ServerRequest;

class GemGetAction
{
    public function __invoke(ServerRequest $request){
        session_start();
        $gnome_access = isset($_SESSION['gnome_id']) ;
        $master_link = false;

        if($gnome_access){
            if ($_SESSION['gnome_id'] != 0){
                $master_link = (Gnome::find($_SESSION['gnome_id'])->master_gnome ==null)?false:true;
            }

        }


        $elves = Elf::all();
        $gnomes = Gnome::all();
        $parameters= Parameter::all();

        if($request->getMethod() == 'POST'){
            $data = $request->getParsedBody();

            $parameter_sql = ($data['filter_parameter'] != '')? ['parameter_id','=',$data['filter_parameter']]:['parameter_id','>',0];
            $gnome_sql = ($data['filter_gnome'] != '')? ['gnome_id','=',$data['filter_gnome']]:['gnome_id','>',0];
            $elf_sql = ($data['filter_elf'] != '')? ['elf_id','=',$data['filter_elf']]:['elf_id','>',0];

            $gems = Gem::where([
                $parameter_sql,
                $gnome_sql,
                $elf_sql
            ])->orderBy('created_at','asc')->get();
        }
        else{
            $gems = Gem::all();
        }
        return view('gem_get',[
            'gems' => $gems,
            'elves' => $elves,
            'gnomes' => $gnomes,
            'parameters' => $parameters,
            'master_link' => $master_link,
        ]);
    }
}
