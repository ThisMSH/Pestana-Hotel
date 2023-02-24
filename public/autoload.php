<?php
session_start();

// DIRECTORY_SEPARATOR == '/' or '\' based on the OS
define("ROOT_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define("APP", ROOT_PATH . 'app' . DIRECTORY_SEPARATOR);
define("CORE", APP . 'core' . DIRECTORY_SEPARATOR);
define("CONFIG", APP . 'config' . DIRECTORY_SEPARATOR);
define("CONTROLLERS", APP . 'controllers' . DIRECTORY_SEPARATOR);
define("MODELS", APP . 'models' . DIRECTORY_SEPARATOR);
define("VIEWS", APP . 'views' . DIRECTORY_SEPARATOR);
define("HELPERS", APP . 'helpers' . DIRECTORY_SEPARATOR);
define("INCLUDES", VIEWS . 'includes' . DIRECTORY_SEPARATOR);

// require the config file
require_once(CONFIG . "Config.php");

// autoload all classes 
$modules = [ROOT_PATH, APP, CONFIG, CORE, VIEWS, CONTROLLERS, HELPERS, MODELS, VIEWS];
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register('spl_autoload');

// Instantiating the App class
new App();