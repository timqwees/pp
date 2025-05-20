<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Post\Post;
use App\Components\Auth\Auth;
use App\Components\Diary\Diary;

session_start();

header('Content-Type: application/json');

// Получаем параметры запроса
$component = $_GET['component'] ?? '';
$action = $_GET['action'] ?? '';

try {
 switch ($component) {
  case 'auth':
   $auth = Auth::getInstance();
   switch ($action) {
    case 'check':
     echo json_encode([
      'success' => true,
      'result' => [
       'isAuthenticated' => $auth->isAuthenticated(),
       'userId' => $auth->getUserId()
      ]
     ]);
     break;
    default:
     throw new Exception('Unknown action');
   }
   break;

  case 'post':
   switch ($action) {
    case 'create':
     $post = new Post([
      'id' => uniqid(),
      'title' => 'Новый пост',
      'content' => 'Содержание поста',
      'author_id' => 1,
      'created_at' => date('Y-m-d H:i:s')
     ]);

     echo json_encode([
      'success' => true,
      'result' => $post->toArray()
     ]);
     break;
    default:
     throw new Exception('Unknown action');
   }
   break;

  case 'diary':
   $diary = new Diary(1); // Используем тестовый ID пользователя
   switch ($action) {
    case 'create':
     $entry = $diary->addEntry([
      'title' => 'Мой день',
      'content' => 'Сегодня я...'
     ]);

     echo json_encode([
      'success' => true,
      'result' => $entry
     ]);
     break;
    default:
     throw new Exception('Unknown action');
   }
   break;

  default:
   throw new Exception('Unknown component');
 }
} catch (Exception $e) {
 http_response_code(500);
 echo json_encode([
  'success' => false,
  'error' => $e->getMessage()
 ]);
}