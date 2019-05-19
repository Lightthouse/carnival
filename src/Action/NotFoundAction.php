<?php

namespace ESoft\Action;

use GuzzleHttp\Psr7\ServerRequest;

class NotFoundAction
{
    public function __invoke(ServerRequest $request)
    {
        return view('not_found');
    }
}
