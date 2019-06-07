<?php


namespace ESoft\Action;

use ESoft\Model\Gem;
use GuzzleHttp\Psr7\ServerRequest;

class GemDistributeAction
{
    public function __invoke(ServerRequest $request){
        $gems = Gem::where('elf_id','=',null)->get();
        return view('gem_distribute',[
            'gems' => $gems
        ]);
    }
}
