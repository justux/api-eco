<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

$app = new Silex\Application();



//fb

$app->POST('/v2/database', function(Application $app, Request $request) {
      $firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
      
      $row = array('name' => $request->request->get('name'),'surname' => $request->request->get('surname'));

            return new Response($firebase->push("pet/", $row));
            });





$app->run();
