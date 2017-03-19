<?php

session_start();

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

require_once APP . 'config/config.php';
//core classes
require_once APP . 'core/model.php';
require_once APP . 'core/application.php';
require_once APP . 'core/controller.php';
require_once APP . 'core/view.php';
//image manipulation
require_once APP . 'lib/Image.php';

$app = new Application();
