<?php

namespace ESoft\Action;

use ESoft\Model\Elf;
use GuzzleHttp\Psr7\ServerRequest;

class ElfGetAction
{
    public function __invoke(ServerRequest $request){
        $elf = Elf::find($request->getAttribute('id'));
        return view('elf_get',[
            'elf' => $elf
        ]);
    }
}
