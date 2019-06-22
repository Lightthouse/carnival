<?php

namespace ESoft\Action;

use ESoft\Model\Elf;
use ESoft\Model\Gnome;
use GuzzleHttp\Psr7\ServerRequest;

class HomeAction
{
    public function __invoke(ServerRequest $request)
    {
        session_start();
        $gnome_access = isset($_SESSION['gnome_id']) ;
        $elf_access = isset($_SESSION['elf_id']);


        if (!$gnome_access && !$elf_access){
            header('Location: /signIn');
            exit();
        }
        $gnomes = Gnome::all();
        $elves = Elf::all();

        if($_SESSION['gnome_id'] == 0){
            $this_gnome = 0;
            $this_elf = Elf::find($_SESSION['elf_id'])->id;
        }
        else{
            $this_gnome = Gnome::find($_SESSION['gnome_id'])->id;
            $this_elf = 0;
        }


        return view('home',[
            'gnomes' => $gnomes,
            'elves' => $elves,
            'this_gnome' => $this_gnome,
            'this_elf' => $this_elf,
        ]);
    }
}
