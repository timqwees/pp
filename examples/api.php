<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Post\Post;
use App\Components\Auth\Auth;
use App\Components\Diary\Diary;

session_start();

header('Content-Type: application/json');

// Проверка авторизации
$auth = Auth::getInstance();
if (!$auth->isAuthenticated()) {
  http_response_code(401);
  echo json_encode(['error' => 'Unauthorized']);
  exit;
}

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Функция для получения данных запроса
function getRequestData()
{
  $data = json_decode(file_get_contents('php://input'), true);
  if (!$data) {
    $data = $_POST;
  }
  return $data;
}

// Функция для проверки обязательных полей
function validateRequiredFields($data, $fields)
{
  foreach ($fields as $field) {
    if (empty($data[$field])) {
      http_response_code(400);
      echo json_encode(['error' => ucfirst($field) . ' is required']);
      exit;
    }
  }
  return true;
}

// Обработка запросов к постам
if (strpos($path, '/api/posts') === 0) {
  switch ($method) {
    case 'POST':
      $data = getRequestData();
      validateRequiredFields($data, ['title', 'content']);

      $post = new Post([
        'id' => uniqid(), // Улучшенная генерация ID
        'title' => htmlspecialchars($data['title']),
        'content' => htmlspecialchars($data['content']),
        'author_id' => $auth->getUserId(),
        'created_at' => date('Y-m-d H:i:s')
      ]);

      echo json_encode([
        'success' => true,
        'post' => $post->toArray()
      ]);
      break;

    case 'GET':
      // Получение списка постов
      $posts = [
        new Post([
          'id' => 1,
          'title' => 'Тестовый пост',
          'content' => 'Это тестовый пост для демонстрации функционала.',
          'author_id' => $auth->getUserId(),
          'created_at' => date('Y-m-d H:i:s')
        ])
      ];

      echo json_encode([
        'success' => true,
        'posts' => array_map(function ($post) {
          return $post->toArray();
        }, $posts)
      ]);
      break;

    case 'DELETE':
      $postId = basename($path);
      if (empty($postId)) {
        http_response_code(400);
        echo json_encode(['error' => 'Post ID is required']);
        exit;
      }

      echo json_encode([
        'success' => true,
        'message' => 'Post deleted successfully'
      ]);
      break;

    default:
      http_response_code(405);
      echo json_encode(['error' => 'Method not allowed']);
      break;
  }
}
// Обработка запросов к комментариям
elseif (strpos($path, '/api/posts/comment') === 0) {
  if ($method === 'POST') {
    $data = getRequestData();
    validateRequiredFields($data, ['content', 'post_id']);

    echo json_encode([
      'success' => true,
      'comment' => [
        'id' => uniqid(),
        'post_id' => $data['post_id'],
        'content' => htmlspecialchars($data['content']),
        'author_id' => $auth->getUserId(),
        'created_at' => date('Y-m-d H:i:s')
      ]
    ]);
  } else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
  }
}
// Обработка запросов к ежедневнику
elseif (strpos($path, '/api/diary/entries') === 0) {
  try {
    $diary = new Diary($auth->getUserId());

    switch ($method) {
      case 'GET':
        $entries = $diary->getEntries();
        echo json_encode([
          'success' => true,
          'entries' => $entries
        ]);
        break;

      case 'POST':
        $data = getRequestData();
        validateRequiredFields($data, ['title', 'content']);

        $entry = $diary->addEntry([
          'title' => htmlspecialchars($data['title']),
          'content' => htmlspecialchars($data['content'])
        ]);

        echo json_encode([
          'success' => true,
          'entry' => $entry
        ]);
        break;

      case 'DELETE':
        $entryId = basename($path);
        if (empty($entryId)) {
          http_response_code(400);
          echo json_encode(['error' => 'Entry ID is required']);
          exit;
        }

        if ($diary->deleteEntry((int) $entryId)) {
          echo json_encode([
            'success' => true,
            'message' => 'Entry deleted successfully'
          ]);
        } else {
          http_response_code(404);
          echo json_encode(['error' => 'Entry not found']);
        }
        break;

      default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
    }
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
      'error' => 'Internal server error',
      'message' => $e->getMessage()
    ]);
  }
} else {
  http_response_code(404);
  echo json_encode(['error' => 'Not found']);
}