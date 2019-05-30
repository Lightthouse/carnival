<?php

$routerContainer = new \Aura\Router\RouterContainer();
$router = $routerContainer->getMap();

$router->get('home','/',\ESoft\Action\HomeAction::class);

$router->get('gnome_get','/gnomes/{id}',\ESoft\Action\GnomeGetAction::class);
$router->get('elf_get','/elves/{id}',\ESoft\Action\ElfGetAction::class);

$router->get('gem_get','/gems',\ESoft\Action\GemGetAction::class);
$router->get('gem_add','/gemsAdd',\ESoft\Action\GemAddAction::class);


$router->get('sign_in','/signIn',\ESoft\Action\SignInAction::class);
$router->post('sign_in.post','/signIn',\ESoft\Action\SignInAction::class);

$router->get('sign_up','/signUp',\ESoft\Action\SignUpAction::class);
$router->post('sign_up.post','/signUp',\ESoft\Action\SignUpAction::class);

