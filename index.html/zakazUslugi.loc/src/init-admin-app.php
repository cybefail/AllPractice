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

$id = (int)($_GET['id'] ?? 0);
if($id === 0){
    header('Location: admin-panel.php');
    exit();
}
$application = new \src\Application($request, $db);
$applicationData = $application->getId($id);
if(empty($applicationData)){
    header('Location: 404.php');
    exit();
}
$applicationData = $applicationData[0];
if($request->isPost){
    $data = $request->post();
    try{
        if(empty($data['date'])){
            throw new InvalidArgumentException('Не указана дата');
        }
        if(empty($data['time'])){
            throw new InvalidArgumentException('Не указано время');
        }
        if(!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data['date'])){
            throw new InvalidArgumentException('Неверный формат даты');
        }
        if(!preg_match('/^\d{2}:\d{2}$/', $data['time'])){
            throw new InvalidArgumentException('Неверный формат времени');
        }
        $application->id = $id;
        $application->update(['date' => $data['date'], 'time' => $data['time']]);
        $applicationData['date'] = $data['date'];
        $applicationData['time'] = $data['time'];
        $flash = 'Время или дата успешно изменено';
    }catch(\src\exceptions\InvalidArgumentException $e){
        $error = $e->getMessage();
    }
}
if(isset($_GET['submit'])){
    $application->id = $id;
    $application->update(['status' => 'timereserv']);
    $applicationData['status'] = 'timereserv';
    $flash = 'Заявка подтверждена';
}

if(isset($_GET['finish'])){
    $application->id = $id;
    $application->update(['status' => 'provided']);
    $applicationData['status'] = 'provided';
    $flash = 'Заявка завершена';
}
?>