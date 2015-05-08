
<?php

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

// Use Loader() to autoload our model
$loader = new Loader();

$loader->registerDirs(array(
    __DIR__ . '/models/'
))->register();

$di = new FactoryDefault();

//Set up the database service
$di->set('db', function(){
    return new PdoMysql(array(
        "host"      => "localhost",
        "username"  => "root",
        "password"  => "root",
        "dbname"    => "familytree"
    ));
});

//Create and bind the DI to the application
$app = new Micro($di);

require_once('routes/users.php');
$app->get('/',function() use($app){
    echo 'Welcome to familytree API';
});
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo 'This is crazy, but this page was not found!';
});

$app->handle();
