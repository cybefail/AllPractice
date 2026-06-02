<?php

use src\Application;

require 'init.php';

if($user->isGuest){
    header('Location: Login.php');
    exit();
}
if(!$user->isAdmin){
    header('Location: Login.php');
    exit();}

$application = new \src\Application($request, $db);
$application = $application->findAll();
if($application === null){
    $application = [];
}