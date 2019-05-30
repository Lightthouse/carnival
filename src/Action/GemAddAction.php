<?php


namespace ESoft\Action;


use ESoft\Model\Parameter;
use GuzzleHttp\Psr7\ServerRequest;

class GemAddAction
{
    public function __invoke(ServerRequest $request)
    {
        if($request == "POST"){

        }

        $gems = Parameter::all();
        return view('gem_add',[
            'gems' => $gems
        ]);
    }
}
