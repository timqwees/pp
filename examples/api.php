<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PhpFramework\Components\TodoList;

header('Content-Type: application/json');

$todoList = new TodoList();
$action = $_GET['action'] ?? '';

switch ($action) {
 case 'add':
  $data = json_decode(file_get_contents('php://input'), true);
  $todoList->addTodo($data['text']);
  echo json_encode(['success' => true]);
  break;

 case 'toggle':
  $data = json_decode(file_get_contents('php://input'), true);
  $todoList->toggleTodo($data['id']);
  echo json_encode(['success' => true]);
  break;

 case 'delete':
  $data = json_decode(file_get_contents('php://input'), true);
  $todoList->deleteTodo($data['id']);
  echo json_encode(['success' => true]);
  break;

 default:
  http_response_code(404);
  echo json_encode(['error' => 'Action not found']);
}