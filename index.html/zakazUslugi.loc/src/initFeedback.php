<?php

use src\Feedback;
use src\services\Request;
use src\services\DB;

require 'init.php';

$feedback = new Feedback($request, $db);

if($request->isPost){
    $feeback->loadFromForm($request->post(), $_FILES['image_file']);
    try{
        $feeback->validate();
        if($feeback->save());{
            $_SESSION['flash'] = 'Отзыв добавлен';
        }
    }catch(src\exceptions\InvalidArgumentException $e){
        $error = $e->getMessage();
    }
}

if(isset($_SESSION['flash'])){
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

$feedbacks = $feeback->findAll();