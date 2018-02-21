<?php
session_start();
/**
 * Created by PhpStorm.
 * User: bsse0
 * Date: 2/14/2018
 * Time: 6:00 PM
 */
//include config
require 'config.php';

require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';
require 'classes/Messages.php';

require 'controller/home.php';
require 'controller/user.php';
require 'controller/share.php';

require 'models/home.php';
require 'models/share.php';
require 'models/user.php';

//require 'view/main.php';

$bootstarp = new Bootstrap($_GET);
$controller = $bootstarp->createController();

if($controller){
    $controller->executeAction();
}