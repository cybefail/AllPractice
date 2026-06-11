<?php

require 'init.php';

if($user->isGuest){
    header('Location: login.php');
    exit();
}
if(!$user->isAdmin()){
    header('Location: login.php');
    exit();
}

$application = new \src\Application($request, $db);
$applications = $application->findAll();
if($applications === null){
    $applications = [];
}
$statusFilter = $_GET['status_id'] ?? '';
if(!empty($statusFilter)){
    $applications = array_filter($applications, function($app) use ($statusFilter){
        return $app['status'] === $statusFilter;
    });
}
if(isset($_GET['today'])){
    $today = date('Y-m-d');
    $applications = array_filter($applications, function($app) use ($today){
        return $app['date'] === $today;
    });
}