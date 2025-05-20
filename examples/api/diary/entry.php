<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Components\Auth\Auth;
use App\Components\Diary\Diary;

// Устанавливаем заголовок для JSON-ответа
header('Content-Type: application/json; charset=utf-8');

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
 http_response_code(405);
 echo json_encode([
  'success' => false,
  'error' => 'Method not allowed'
 ]);
 exit;
}

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

// Получаем данные из формы
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

// Проверяем обязательные поля
if (empty($title) || empty($content)) {
 http_response_code(400);
 echo json_encode([
  'success' => false,
  'error' => 'Title and content are required'
 ]);
 exit;
}

try {
 // Создаем новую запись
 $diary = new Diary($auth->getUserId());
 $diary->addEntry([
  'title' => $title,
  'content' => $content
 ]);

 // Возвращаем успешный ответ
 echo json_encode([
  'success' => true,
  'message' => 'Entry added successfully'
 ]);
} catch (Exception $e) {
 http_response_code(500);
 echo json_encode([
  'success' => false,
  'error' => 'Internal server error',
  'message' => $e->getMessage()
 ]);
}