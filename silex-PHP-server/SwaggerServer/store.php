<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/firebase-php/firebaseLib.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

$app = new Silex\Application();


$app->DELETE('/v2/store/order/{orderId}', function(Application $app, Request $request, $orderId) {
            return new Response('How about implementing deleteOrder as a DELETE method ?');
            });


$app->GET('/v2/subdevices/inventory', function(Application $app, Request $request) {
            return new Response('How about implementing getInventory as a GET method ?');
            });


$app->GET('/v2/store/order/{orderId}', function(Application $app, Request $request, $orderId) {
            return new Response('How about implementing getOrderById as a GET method ?');
            });


$app->POST('/v2/store/order', function(Application $app, Request $request) {
            return new Response('How about implementing placeOrder as a POST method ?');
            });




$app->run();
