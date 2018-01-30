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

$app->POST('/v2/user', function(Application $app, Request $request) {
      $firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
      $row = array(
            'password' => $request->request->get('password'),
            'name' => $request->request->get('name'),
            'surname' => $request->request->get('surname'),
            'city' => $request->request->get('city'));

      return new Response($firebase->update("user/".$request->request->get('email'), $row));
      });



$app->DELETE('/v2/user/{userEmail}', function(Application $app, Request $request, $userEmail) {

      $firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
      return new Response($firebase->delete("user/".$userEmail));
});




$app->GET('/v2/user/{userEmail}', function(Application $app, Request $request, $userEmail) {


      $firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
      


      return new Response($firebase->get("user/".$userEmail));
});





$app->GET('/v2/user/findByStatus', function(Application $app, Request $request) {
            $status = $request->get('status');
            return new Response('How about implementing findusersByStatus as a GET method ?');
            });


$app->GET('/v2/user/findByTags', function(Application $app, Request $request) {
            $tags = $request->get('tags');
            return new Response('How about implementing findusersByTags as a GET method ?');
            });


//fb

$app->PUT('/v2/user', function(Application $app, Request $request) {
      $firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
      $row = array('name' => $request->request->get('name'),'surname' => $request->request->get('surname'));
            return new Response($firebase->set("user/", $row));
            });


$app->POST('/v2/user/{userId}', function(Application $app, Request $request, $userId) {
            $name = $request->get('name');
            $status = $request->get('status');
            return new Response('How about implementing updateuserWithForm as a POST method ?');
            });


$app->POST('/v2/user/{userId}/uploadImage', function(Application $app, Request $request, $userId) {
            $additional_metadata = $request->get('additional_metadata');
            $file = $request->get('file');
            return new Response('How about implementing uploadFile as a POST method ?');
            });



$app->run();
