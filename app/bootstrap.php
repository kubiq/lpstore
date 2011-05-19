<?php

/**
 * My Application bootstrap file.
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */


use Nette\Diagnostics\Debugger;
use Nette\Environment;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\SimpleRouter;



// Step 1: Load Nette Framework 
// this allows load Nette Framework classes automatically so that
// you don't have to litter your code with 'require' statements
require LIBS_DIR . '/Nette/loader.php';

// Step 2: Configure environment
// 2a) enable Nette\Debug for better exception and error visualisation
Debugger::$strictMode = TRUE;
Debugger::enable(Debugger::DEVELOPMENT, 'log/', 'thebiftek@gmail.com');

// 2b) load configuration from config.ini file
$configurator = new Nette\Configurator();
$configurator->loadConfig(__DIR__ . '/config.neon');

// Configure application
$application = $configurator->container->application;
$application->errorPresenter = 'Error';
$application->catchExceptions = FALSE;

// Step 4: Setup application router
$router = $application->getRouter();

$application->onStartup[] = function() use ($application) {
	$router = $application->getRouter();

	$router[] = new SimpleRouter(array(
	    'presenter' => 'Item',
	    'action' => 'default',
	));
	
//	$router[] = new Route('index.php', 'Item:default', Route::ONE_WAY);
//
//	$router[] = new Route('<presenter>/<action>', 'Item:default');
};

$application->onStartup[] = 'BaseModel::connect';
$application->onShutdown[] = 'BaseModel::disconnect';

// Step 5: Run the application!
$application->run();