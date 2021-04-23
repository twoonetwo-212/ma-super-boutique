<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Core\Main;


define('ROOT', dirname(__DIR__));

require_once ROOT."/vendor/autoload.php";


$app = new Main;
$app->start();