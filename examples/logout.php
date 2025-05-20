<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Auth\Auth;

// Выход из системы
$auth = Auth::getInstance();
$auth->logout();

// Перенаправление на страницу входа
header('Location: /examples/login.php');
exit;