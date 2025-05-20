<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PhpFramework\Components\TodoList;
use PhpFramework\Core\VirtualDom;

// Создаем экземпляр компонента
$todoList = new TodoList();

// Создаем виртуальный DOM
$vdom = new VirtualDom();

// Рендерим компонент
$html = $todoList->render();

// Добавляем необходимый JavaScript
$js = "
<script>
function addTodo() {
    const text = prompt('Введите текст задачи:');
    if (text) {
        fetch('/api/todo/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ text })
        }).then(() => location.reload());
    }
}

function toggleTodo(id) {
    fetch('/api/todo/toggle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id })
    }).then(() => location.reload());
}

function deleteTodo(id) {
    if (confirm('Удалить задачу?')) {
        fetch('/api/todo/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id })
        }).then(() => location.reload());
    }
}
</script>
";

// Выводим результат
echo "<!DOCTYPE html>
<html>
<head>
    <title>Todo List Example</title>
    <style>
        .todo-list {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .todo-list ul {
            list-style: none;
            padding: 0;
        }
        .todo-list li {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .todo-list button {
            margin-left: 10px;
            padding: 5px 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .todo-list button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    {$html}
    {$js}
</body>
</html>";