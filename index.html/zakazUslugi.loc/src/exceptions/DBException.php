<?php
// Принудительно подключаем файлы, чтобы PHP перестал ругаться на автозагрузчик
require_once __DIR__ . 'src/exceptions/DbExceptions.php';

spl_autoload_register(function($class) {
    $classPath = str_replace('\\', '/', $class);
    $file = dirname(__DIR__) . '/' . $classPath . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
