<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/firebase-php/firebaseLib.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

$app = new Silex\Application();


$app->POST('/v2/user', function(Application $app, Request $request) {
	$firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
	$row = array(
	    'password' => $request->request->get('password'),
	    'name' => $request->request->get('name'),
	    'surname' => $request->request->get('surname'),
	    'city' => $request->request->get('city'),
          'email' => $request->request->get('email')
      );
      print_r($row);
      $user = $request->request->get('email');
	return new Response($firebase->push("user/".$user, $row));
});





$app->POST('/v2/user/createWithArray', function(Application $app, Request $request) {
            return new Response('How about implementing createUsersWithArrayInput as a POST method ?');
            });


$app->POST('/v2/user/createWithList', function(Application $app, Request $request) {
            return new Response('How about implementing createUsersWithListInput as a POST method ?');
            });


$app->DELETE('/v2/user/{username}', function(Application $app, Request $request, $username) {
            return new Response('How about implementing deleteUser as a DELETE method ?'.$request->request->get('username').'aaaaa');
            });


$app->GET('/v2/user/{username}', function(Application $app, Request $request, $username) {
           $firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
	$row = array(
	    'name' => $request->request->get('username'));

	return new Response($request->request->get('username'));
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
