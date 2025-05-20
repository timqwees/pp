<?php

// Отключаем вывод ошибок в HTML
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Устанавливаем обработчик ошибок
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
  header('Content-Type: application/json; charset=utf-8');
  http_response_code(500);
  echo json_encode([
    'success' => false,
    'error' => 'Internal server error',
    'message' => $errstr
  ]);
  exit;
});

require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Post\Post;
use App\Components\Auth\Auth;
use App\Components\Diary\Diary;

session_start();

// Устанавливаем заголовки для JSON
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Обработка preflight запросов
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit;
}

// Проверка авторизации
$auth = Auth::getInstance();
if (!$auth->isAuthenticated()) {
  http_response_code(401);
  echo json_encode([
    'success' => false,
    'error' => 'Unauthorized'
  ]);
  exit;
}

// Получаем метод и путь запроса
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Функция для получения данных запроса
function getRequestData()
{
  $input = file_get_contents('php://input');
  if (empty($input)) {
    return $_POST;
  }

  $data = json_decode($input, true);
  if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode([
      'success' => false,
      'error' => 'Invalid JSON format',
      'details' => json_last_error_msg()
    ]);
    exit;
  }
  return $data;
}

// Функция для отправки JSON ответа
function sendJsonResponse($data, $statusCode = 200)
{
  http_response_code($statusCode);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  exit;
}

// Функция для проверки обязательных полей
function validateRequiredFields($data, $fields)
{
  foreach ($fields as $field) {
    if (empty($data[$field])) {
      sendJsonResponse([
        'success' => false,
        'error' => ucfirst($field) . ' is required'
      ], 400);
    }
  }
  return true;
}

try {
  // Обработка запросов к постам
  if (strpos($path, '/api/posts') === 0) {
    switch ($method) {
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

        sendJsonResponse([
          'success' => true,
          'posts' => array_map(function ($post) {
            return $post->toArray();
          }, $posts)
        ]);
        break;

      case 'POST':
        $data = getRequestData();
        validateRequiredFields($data, ['title', 'content']);

        $post = new Post([
          'id' => uniqid(),
          'title' => htmlspecialchars($data['title']),
          'content' => htmlspecialchars($data['content']),
          'author_id' => $auth->getUserId(),
          'created_at' => date('Y-m-d H:i:s')
        ]);

        sendJsonResponse([
          'success' => true,
          'post' => $post->toArray()
        ]);
        break;

      default:
        sendJsonResponse([
          'success' => false,
          'error' => 'Method not allowed'
        ], 405);
        break;
    }
  }
  // Обработка запросов к комментариям
  elseif (strpos($path, '/api/posts/comment') === 0) {
    if ($method === 'POST') {
      $data = getRequestData();
      validateRequiredFields($data, ['content', 'post_id']);

      sendJsonResponse([
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
      sendJsonResponse([
        'success' => false,
        'error' => 'Method not allowed'
      ], 405);
    }
  }
  // Обработка запросов к дневнику
  elseif (strpos($path, '/api/diary/entries') === 0) {
    $diary = new Diary($auth->getUserId());

    switch ($method) {
      case 'GET':
        $entries = $diary->getEntries();
        sendJsonResponse([
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

        sendJsonResponse([
          'success' => true,
          'entry' => $entry
        ]);
        break;

      default:
        sendJsonResponse([
          'success' => false,
          'error' => 'Method not allowed'
        ], 405);
        break;
    }
  } else {
    sendJsonResponse([
      'success' => false,
      'error' => 'Not found'
    ], 404);
  }
} catch (Exception $e) {
  sendJsonResponse([
    'success' => false,
    'error' => 'Internal server error',
    'message' => $e->getMessage()
  ], 500);
}