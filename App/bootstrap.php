<?php

define("BASE_PATH", __DIR__);
define('ENCRYPTION_KEY', '!@@#%B1910096nhl@#$!&');

require "../vendor/autoload.php";

use Illuminate\Config\Repository;

$configPath = BASE_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;

$config = new Repository();

foreach (glob($configPath . "*.php") as $phpFile) {
    $config->set(
        basename($phpFile, '.php'),
        require_once $phpFile
    );
}


$session = new \App\Http\Session\Session();
$session->start();

$request = \App\Http\Request::createFromGlobals();

$routerPath = BASE_PATH . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR;
foreach (glob($routerPath . "*.php") as $phpFile) {
    require_once $phpFile;
}

$dbConfig = $config->get("app.db");

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection($dbConfig);

$capsule->setAsGlobal();
$capsule->bootEloquent();