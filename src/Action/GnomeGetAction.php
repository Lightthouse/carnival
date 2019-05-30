<?php


namespace ESoft\Action;

use ESoft\Model\Gem;
use ESoft\Model\Gnome;
use GuzzleHttp\Psr7\ServerRequest;

class GnomeGetAction
{
    public function __invoke(ServerRequest $request){
        if(ctype_digit ($request->getAttribute('id'))){
            $gnome = Gnome::find($request->getAttribute('id'));
            // $gems = Gem::where("gnome_id","=","id");

            return view('gnome_get',[
                'gnome' => $gnome
            ]);
        }
        else{
            return view('not_found');
        }



    }
}
