<?php

use src\Feedback;

require 'init.php';

if($user->isGuest){
    header('Location: login.php');
    exit();
}
if(!$user->isAdmin()){
    header('Location: login.php');
    exit();
}
$feedback = new \src\Feedback($request, $db);
$feedbacks = $feedback->findAll();
if($feedbacks === null) $feedbacks = [];

$feedbacks = array_filter($feedbacks, function($item){
    return $item['status'] === 'pending';
});
if(isset($_GET['approve'])){
    $id = (int)($_GET['approve']);
    $feedback->id = $id;
    $feedback->update(['status' => 'approved']);
    header('Location: admin-reviews.php');
    exit();
}
if(isset($_GET['reject'])){
    $id = (int)($_GET['reject']);
    $feedback->id = $id;
    $feedback->update(['status' => 'rejected']);
    header('Location: admin-reviews.php');
    exit();
}