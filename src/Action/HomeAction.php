<?php

namespace ESoft\Action;

use ESoft\Model\Elf;
use ESoft\Model\Gnome;
use GuzzleHttp\Psr7\ServerRequest;

class HomeAction
{
    public function __invoke(ServerRequest $request)
    {
        $gnomes = Gnome::all();
        $elves = Elf::all();
        return view('home',[
            'gnomes' => $gnomes,
            'elves' => $elves
        ]);
    }
}
