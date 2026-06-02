<?php

use src\Application;

require 'init.php';

if($user->isGuest){
    header('location: index.php');
    exit();
}

$application = new \src\Application($request, $db);
if($request->isPost){
    $application->load($request->post());
    try{
        $application->validate();
        $application->saveApplication($user->id);
        header('Location account.php');
        exit();
    }catch(\src\exceptions\InvalidArgumentException $e){
        $error = $e->getMessage();
    }

}

$application = $application->findByColumn('user_id', $user->id);
if($application === null) $application =[];
?>