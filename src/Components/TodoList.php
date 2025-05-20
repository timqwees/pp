<?php

namespace PhpFramework\Components;

class TodoList extends Component
{
 protected function getInitialState(): array
 {
  return [
   'todos' => [
    ['id' => 1, 'text' => 'Изучить PHP', 'completed' => false],
    ['id' => 2, 'text' => 'Создать фреймворк', 'completed' => false],
    ['id' => 3, 'text' => 'Написать документацию', 'completed' => false]
   ]
  ];
 }

 public function render(): string
 {
  $todos = $this->getState()['todos'];
  $items = '';

  foreach ($todos as $todo) {
   $items .= $this->renderTodoItem($todo);
  }

  return "
            <div class='todo-list'>
                <h2>Список задач</h2>
                <ul>{$items}</ul>
                <button onclick='addTodo()'>Добавить задачу</button>
            </div>
        ";
 }

 private function renderTodoItem(array $todo): string
 {
  $completed = $todo['completed'] ? 'checked' : '';
  return "
            <li>
                <input type='checkbox' {$completed} onchange='toggleTodo({$todo['id']})'>
                <span>{$todo['text']}</span>
                <button onclick='deleteTodo({$todo['id']})'>Удалить</button>
            </li>
        ";
 }

 public function addTodo(string $text): void
 {
  $todos = $this->getState()['todos'];
  $todos[] = [
   'id' => count($todos) + 1,
   'text' => $text,
   'completed' => false
  ];
  $this->setState(['todos' => $todos]);
 }

 public function toggleTodo(int $id): void
 {
  $todos = $this->getState()['todos'];
  foreach ($todos as &$todo) {
   if ($todo['id'] === $id) {
    $todo['completed'] = !$todo['completed'];
    break;
   }
  }
  $this->setState(['todos' => $todos]);
 }

 public function deleteTodo(int $id): void
 {
  $todos = $this->getState()['todos'];
  $todos = array_filter($todos, fn($todo) => $todo['id'] !== $id);
  $this->setState(['todos' => array_values($todos)]);
 }
}