<?php

/**
 * My Application bootstrap file.
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */


use Nette\Debug;
use Nette\Environment;
use Nette\Application\Route;
use Nette\Application\SimpleRouter;


// Step 1: Load Nette Framework 
// this allows load Nette Framework classes automatically so that
// you don't have to litter your code with 'require' statements
require LIBS_DIR . '/Nette/loader.php';


// Step 2: Configure environment
// 2a) enable Nette\Debug for better exception and error visualisation
Debug::$strictMode = TRUE;
Debug::enable(Debug::DEVELOPMENT);


// 2b) load configuration from config.ini file
Environment::loadConfig();
 
//Environment::setMode(Debug::PRODUCTION);

// Step 3: Configure application
// 3a) get and setup a front controller
$application = Environment::getApplication();
$application->errorPresenter = 'Error';
$application->catchExceptions = false;



// Step 4: Setup application router
$router = $application->getRouter();



$router[] = new SimpleRouter(array(
    'presenter' => 'Item',
    'action' => 'default',
    'q' => NULL,
));
//$router[] = new Route('index.php', 'Item:default', Route::ONE_WAY);
//
//$router[] = new Route('<presenter>/<action>[/<q>]', 'Item:default');




$application->onStartup[] = 'BaseModel::connect';
$application->onShutdown[] = 'BaseModel::disconnect';

// Step 5: Run the application!
$application->run();
