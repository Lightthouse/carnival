<?php

    require_once "../src/functions.php";
    require_once "../vendor/autoload.php";
    require_once "../config/dotenv.php";
    require_once "../config/database.php";
    require_once "../config/view.php";
    require_once "../config/router.php";
    require_once "../config/container.php";

/*   $gem = \ESoft\Model\Gem::find('1');
    $gnome = \ESoft\Model\Gnome::find('3');
    $gems =['red','blue','beer','salat','green','red','red','blue'];

    $gems_params = [
        ['red','url',3],
    ];

    var_dump(gnome_gems($gnome));
    exit();*/

$serverRequest = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();

$matcher = $routerContainer->getmatcher();
$response = new \GuzzleHttp\Psr7\Response();

if($action = $matcher->match($serverRequest))
{
    foreach($action->attributes as $name => $attribute)
    {
        $serverRequest = $serverRequest->withAttribute($name,$attribute);
    }
    if($container->has($action->handler))
    {
        $action = $container->get($action->handler);
    }
    else
    {
        $action = new $action->handler;
    }

    $response->getBody()->write(call_user_func($action,$serverRequest));
}
else
{
    $action = new \ESoft\Action\NotFoundAction();
    $response->getBody()->write($action($serverRequest));
}
    echo $response->getBody();
