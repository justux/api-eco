<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/lib/firebase-php/firebaseLib.php';



	$firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');
	$row = array(
	    'password' => $argv['1'],
	    'name' => $argv['2'],
          'email' => $argv['3']
      );

	print_r($firebase->update("user/".$row['email'], $row));