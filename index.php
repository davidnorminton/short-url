<?php
define('BP', __DIR__);

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use App\Helper\LinkFileHelper;

// composer autoload modules
require BP . '/vendor/autoload.php';


// Create Container using PHP-DI
$containerBuilder = new ContainerBuilder();

// add container definitions here!
$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(true);
$containerBuilder->useAnnotations(false);
$containerBuilder->addDefinitions([
    LinkFileHelper::class => new LinkFileHelper()
]);
$container = $containerBuilder->build();

// Set container to create App with on AppFactory
AppFactory::setContainer($container);
$app = AppFactory::create();


// Include router
require BP . '/routes/api.php';

