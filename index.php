<?php
define('DS', DIRECTORY_SEPARATOR);
define('HOME', dirname(__FILE__));
define('LIBDIR', 'lib');
define('CONTROLLERDIR', 'controllers');
define('MODELDIR', 'models');
define('VIEWDIR', 'views');

ini_set('display_errors', 1);

require_once HOME . DS . LIBDIR . DS . 'config.php';

/**
 * Autoload function
 */
function __autoload($class){
  if(file_exists(HOME . DS . LIBDIR . DS . $class. '.php')){
     require_once HOME . DS . LIBDIR . DS . $class. '.php';
  }else if(file_exists(HOME . DS . CONTROLLERDIR . DS . $class. '.php')){
     require_once HOME . DS . CONTROLLERDIR . DS . $class. '.php';
  }else if(file_exists(HOME . DS . MODELDIR . DS . $class. '.php')){
     require_once HOME . DS . MODELDIR . DS . $class. '.php';
  }
}

// Create the application
$app = new Bootstrap();
$app->run();