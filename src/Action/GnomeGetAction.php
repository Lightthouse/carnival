<?php


namespace ESoft\Action;

use ESoft\Model\Gnome;
use GuzzleHttp\Psr7\ServerRequest;

class GnomeGetAction
{
    public function __invoke(ServerRequest $request){
        $gnome = Gnome::find($request->getAttribute('id'));
        return view('gnome_get',[
            'gnome' => $gnome
        ]);
    }
}
