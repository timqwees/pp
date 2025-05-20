<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Post\Post;
use App\Components\Auth\Auth;

session_start();

// Проверка авторизации
$auth = Auth::getInstance();
if (!$auth->isAuthenticated()) {
 header('Location: /login.php');
 exit;
}

// Получаем ID поста из URL
$postId = $_GET['id'] ?? null;

// Если ID не указан, создаем тестовый пост
if (!$postId) {
 $post = new Post([
  'id' => 1,
  'title' => 'Тестовый пост',
  'content' => 'Это тестовый пост для демонстрации функционала.',
  'author_id' => $auth->getUserId(),
  'created_at' => date('Y-m-d H:i:s')
 ]);
} else {
 // TODO: Получение поста из базы данных
 $post = new Post([
  'id' => $postId,
  'title' => 'Пост #' . $postId,
  'content' => 'Содержание поста #' . $postId,
  'author_id' => $auth->getUserId(),
  'created_at' => date('Y-m-d H:i:s')
 ]);
}

// Подключаем шаблон
require_once __DIR__ . '/templates/posts.php';