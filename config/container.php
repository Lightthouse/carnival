<?php

use Aura\Di\ContainerBuilder;

$builder = new ContainerBuilder();
$container = $builder->newInstance();

$container->set(\ESoft\Hash\HashInterface::class, function(){
    return new \ESoft\Hash\Bcrypt();
});

/*$container->set(\ESoft\Randomizer\RandomizerInterface::class, function(){
    return new \ESoft\Randomizer\RandomizerInternet();
});*/

$container->set('validator', function() use($capsule){
    $filesystem = new \Illuminate\Filesystem\Filesystem();
    $loader = new \Illuminate\Translation\FileLoader($filesystem, dirname(dirname(__FILE__)).'/resources/lang');
    $loader->addNamespace('lang',dirname(dirname(__FILE__)).'/resources/lang');
    $loader->load($lang = 'ru', $group = 'validation', $namespace = 'lang');

    $factory = new \Illuminate\Translation\Translator($loader,'ru');
    $validator = new \Illuminate\Validation\Factory($factory);

    $databasePresenceVerifier = new \Illuminate\Validation\DatabasePresenceVerifier($capsule->getDatabaseManager());
    $validator->setPresenceVerifier($databasePresenceVerifier);

    return $validator;
});

$container->set(\ESoft\Action\SignInAction::class, function() use($container){
    $hash = $container->get(\ESoft\Hash\HashInterface::class);
    $validator = $container->get('validator');
    $action = new \ESoft\Action\SignInAction($hash,$validator);
    return $action;
});

$container->set(\ESoft\Action\SignUpAction::class, function() use($container){

    return new \ESoft\Action\SignUpAction(
        $container->get(\ESoft\Hash\HashInterface::class),
        $container->get('validator'));
});

$container->set(\ESoft\Action\GnomeGetAction::class, function() use($container){

    return new \ESoft\Action\GnomeGetAction($container->get('validator'));

});

$container->set(\ESoft\Action\ElfGetAction::class, function() use($container){

    return new \ESoft\Action\ElfGetAction($container->get('validator'));

});
