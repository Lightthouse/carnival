<?php

namespace ESoft\Action;

use ESoft\Model\Elf;
use ESoft\Model\Gem;
use ESoft\Model\Preference;
use GuzzleHttp\Psr7\ServerRequest;

class ElfGetAction
{
    public function __invoke(ServerRequest $request){
        $id = $request->getAttribute('id');

        if(ctype_digit ($id)){

            $elf = Elf::find($id);
            $preferences = Preference::where('elf_id','=',$id)->get();
            $gems = Gem::where('elf_id','=',$id)->get();

            return view('elf_get',[
                'elf' => $elf,
                'preferences' => $preferences,
                'gems' => $gems
            ]);
        }
        else{
            return view('not_found');
        }

    }
}
