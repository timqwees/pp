<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Auth\Auth;
use App\Components\Post\Post;
use App\Components\Diary\Diary;

// Устанавливаем заголовок для JSON-ответа
header('Content-Type: application/json; charset=utf-8');

// Проверяем авторизацию
$auth = Auth::getInstance();
if (!$auth->isAuthenticated()) {
  http_response_code(401);
  echo json_encode([
    'success' => false,
    'error' => 'Unauthorized'
  ]);
  exit;
}

// Получаем параметры запроса
$component = $_GET['component'] ?? '';
$action = $_GET['action'] ?? '';

// Проверяем параметры
if (empty($component) || empty($action)) {
  http_response_code(400);
  echo json_encode([
    'success' => false,
    'error' => 'Component and action are required'
  ]);
  exit;
}

try {
  $result = [];
  $userId = $auth->getUserId();

  switch ($component) {
    case 'auth':
      switch ($action) {
        case 'check':
          $result = [
            'authenticated' => $auth->isAuthenticated(),
            'user' => $auth->getUser()
          ];
          break;
        default:
          throw new Exception('Invalid action for auth component');
      }
      break;

    case 'post':
      $post = new Post($userId);
      switch ($action) {
        case 'create':
          $post->createPost([
            'title' => 'Тестовый пост',
            'content' => 'Это тестовый пост, созданный через API'
          ]);
          $result = [
            'message' => 'Post created successfully',
            'posts' => $post->getPosts()
          ];
          break;
        default:
          throw new Exception('Invalid action for post component');
      }
      break;

    case 'diary':
      $diary = new Diary($userId);
      switch ($action) {
        case 'create':
          $diary->addEntry([
            'title' => 'Тестовая запись',
            'content' => 'Это тестовая запись, созданная через API'
          ]);
          $result = [
            'message' => 'Entry created successfully',
            'entries' => $diary->getEntries()
          ];
          break;
        default:
          throw new Exception('Invalid action for diary component');
      }
      break;

    default:
      throw new Exception('Invalid component');
  }

  echo json_encode([
    'success' => true,
    'result' => $result
  ]);
} catch (Exception $e) {
  http_response_code(500);
  echo json_encode([
    'success' => false,
    'error' => $e->getMessage()
  ]);
}