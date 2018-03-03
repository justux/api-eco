<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/lib/firebase-php/firebaseLib.php';

$firebase = new Firebase('https://luminous-heat-4957.firebaseio.com/');

switch($argv['1']){
      case 'addUser':
            //addUser

            foreach ($argv as $key => $value) {
                  if($key > 1){
                        $arrOpt = explode(":", $value);
                        $row[$arrOpt[0]] = str_replace('.', '_',$arrOpt[1]);      
                  }
                  
            }

            $firebase->update("user/".$row['email'], $row);
      
            break;
      case 'getUser':
            foreach ($argv as $key => $value) {
                  if($key > 1){
                        $arrOpt = explode(":", $value);
                        $row[$arrOpt[0]] = str_replace('.', '_',$arrOpt[1]);      
                  }
                  
            }

            echo($firebase->get("user/".$row['email'], $row));
            break;
      case 'doLogin':
            foreach ($argv as $key => $value) {
                  if($key > 1){
                        $arrOpt = explode(":", $value);
                        $row[$arrOpt[0]] = str_replace('.', '_',$arrOpt[1]);      
                  }
                  
            }

            if(array_key_exists('password', $row) && array_key_exists('email', $row)){

                  $utente = $firebase->get("user/".$row['email'], $row);
                  if($utente != ""){
                        $user = json_decode($utente);
                        if($user->password === $row['password']){
                              echo true;
                        }else{
                              echo false;
                        }
                  }
            }
            break;
}



//getUser



//doLogin




//elementi




//sotto elemento