<?php 
//lancement de l'autoloader

use App\Service\Router\Router;
use App\Service\Autoload;
use App\Controller\HomeController;

// require_once './src/Service/Autoload.php';

// $autoload=new Autoload;


// celui de composer
require_once '../vendor/autoload.php';

$router =new Router($_GET['url']);

$router->get('/user',function(){'page user';});
$router->get('/user/:id',function($id){'affichage user id '.$id;});
$router->post('/user/:id',function($id){'affichage user id '.$id;});
$router->delete('/user/:id',function($id){'suppression user id '.$id;});
$router->put('/user/:id',function($id){'ajout user id '.$id;});

$router->run();