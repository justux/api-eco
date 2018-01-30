<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/firebase-php/firebaseLib.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

$app = new Silex\Application();



//fb

$app->POST('/v2/pet', function(Application $app, Request $request) {
      $firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
      $row = array('name' => $request->request->get('name'),'surname' => $request->request->get('surname'));

            return new Response($firebase->push("pet/", $row));
            });


$app->DELETE('/v2/pet/{petId}', function(Application $app, Request $request, $petId) {
            return new Response('How about implementing deletePet as a DELETE method ?');
            });


$app->GET('/v2/pet/findByStatus', function(Application $app, Request $request) {
            $status = $request->get('status');
            return new Response('How about implementing findPetsByStatus as a GET method ?');
            });


$app->GET('/v2/pet/findByTags', function(Application $app, Request $request) {
            $tags = $request->get('tags');
            return new Response('How about implementing findPetsByTags as a GET method ?');
            });


$app->GET('/v2/pet/{petId}', function(Application $app, Request $request, $petId) {
            return new Response('How about implementing getPetById as a GET method ?');
            });

//fb

$app->PUT('/v2/pet', function(Application $app, Request $request) {
      $firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
      $row = array('name' => $request->request->get('name'),'surname' => $request->request->get('surname'));
            return new Response($firebase->set("pet/", $row));
            });


$app->POST('/v2/pet/{petId}', function(Application $app, Request $request, $petId) {
            $name = $request->get('name');
            $status = $request->get('status');
            return new Response('How about implementing updatePetWithForm as a POST method ?');
            });


$app->POST('/v2/pet/{petId}/uploadImage', function(Application $app, Request $request, $petId) {
            $additional_metadata = $request->get('additional_metadata');
            $file = $request->get('file');
            return new Response('How about implementing uploadFile as a POST method ?');
            });


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


$app->POST('/v2/user', function(Application $app, Request $request) {
            return new Response('How about implementing createUser as a POST method ?');
            });


$app->POST('/v2/user/createWithArray', function(Application $app, Request $request) {
            return new Response('How about implementing createUsersWithArrayInput as a POST method ?');
            });


$app->POST('/v2/user/createWithList', function(Application $app, Request $request) {
            return new Response('How about implementing createUsersWithListInput as a POST method ?');
            });


$app->DELETE('/v2/user/{username}', function(Application $app, Request $request, $username) {
            return new Response('How about implementing deleteUser as a DELETE method ?');
            });


$app->GET('/v2/user/{username}', function(Application $app, Request $request, $username) {
            return new Response('How about implementing getUserByName as a GET method ?');
            });


$app->GET('/v2/user/login', function(Application $app, Request $request) {
            $username = $request->get('username');
            $password = $request->get('password');
            return new Response('How about implementing loginUser as a GET method ?');
            });


$app->GET('/v2/user/logout', function(Application $app, Request $request) {
            return new Response('How about implementing logoutUser as a GET method ?');
            });


$app->PUT('/v2/user/{username}', function(Application $app, Request $request, $username) {
            return new Response('How about implementing updateUser as a PUT method ?');
            });


$app->run();
