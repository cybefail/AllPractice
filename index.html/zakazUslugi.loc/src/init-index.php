<?php
require 'init.php';
$page = 'index.php';
$feedback = new \src\Feedback($request, $db);
$feedbacks = $feedback->findByColumn('status', 'approved');
if($feedbacks === null) $feedbacks = [];
?>