<?php


namespace ESoft\Action;


use ESoft\Model\Gem;
use GuzzleHttp\Psr7\ServerRequest;

class GemGetAction
{
    public function __invoke(ServerRequest $request){
        $gems = Gem::all();
        return view('gem_get',[
            'gems' => $gems
        ]);
    }
}
