<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Демо - PHP Framework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github.min.css">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .navbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        .demo-section {
            padding: 2rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .code-block {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
        }

        .code-block pre {
            margin: 0;
            padding: 0;
            background: transparent;
        }

        .code-block code {
            font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
            font-size: 14px;
            line-height: 1.5;
            color: #24292e;
        }

        .live-demo {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
        }

        .feature-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: transform 0.2s;
            background: #fff;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #1d1d1f;
            font-weight: 600;
        }

        .lead {
            font-size: 1.25rem;
            font-weight: 400;
            color: #515154;
        }

        .card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card h3 {
            margin-bottom: 1rem;
            color: #1d1d1f;
        }

        .card p {
            color: #515154;
            margin-bottom: 0;
        }

        /* Стили для подсветки синтаксиса */
        .hljs {
            background: #f6f8fa;
            border-radius: 6px;
            padding: 16px;
        }

        .hljs-keyword {
            color: #d73a49;
        }

        .hljs-string {
            color: #032f62;
        }

        .hljs-function {
            color: #6f42c1;
        }

        .hljs-variable {
            color: #24292e;
        }

        .hljs-comment {
            color: #6a737d;
        }

        /* Стили для кнопок и интерактивных элементов */
        .btn-primary {
            background-color: #0071e3;
            border-color: #0071e3;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 980px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: #0077ed;
            border-color: #0077ed;
            transform: translateY(-1px);
        }

        /* Стили для навигации */
        .navbar-brand {
            font-weight: 600;
            color: #1d1d1f;
        }

        .nav-link {
            color: #515154;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: #0071e3;
        }

        .nav-link.active {
            color: #0071e3;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="../site/index.html">PHP Framework</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../site/index.html">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../site/about.html">О проекте</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../site/team.html">Участники</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../site/journal.html">Журнал</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../site/resources.html">Ресурсы</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <section class="demo-section">
            <h1 class="display-4 mb-4">Демонстрация фреймворка</h1>
            <p class="lead">Пример реализации Todo List с использованием компонентного подхода</p>
        </section>

        <section class="demo-section">
            <h2 class="h3 mb-4">Основные возможности</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <h3 class="h5">Компонентный подход</h3>
                        <p>Создание переиспользуемых компонентов с собственной логикой и состоянием</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <h3 class="h5">Виртуальный DOM</h3>
                        <p>Эффективное обновление DOM с помощью виртуального представления</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <h3 class="h5">Управление состоянием</h3>
                        <p>Простой и понятный механизм управления состоянием компонентов</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="demo-section">
            <h2 class="h3 mb-4">Пример кода</h2>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="h5 mb-3">Компонент TodoList</h3>
                    <div class="code-block">
                        <pre><code class="language-php">class TodoList extends Component {
    private array $todos = [];
    
    public function render(): string {
        return $this->view('todo-list', [
            'todos' => $this->todos
        ]);
    }
    
    public function addTodo(string $text): void {
        $this->todos[] = [
            'id' => uniqid(),
            'text' => $text,
            'completed' => false
        ];
        $this->update();
    }
}</code></pre>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="h5 mb-3">Шаблон компонента</h3>
                    <div class="code-block">
                        <pre><code class="language-html">&lt;div class="todo-list"&gt;
    &lt;form onsubmit="addTodo(event)"&gt;
        &lt;input type="text" 
               name="todo" 
               placeholder="Добавить задачу"&gt;
        &lt;button type="submit"&gt;Добавить&lt;/button&gt;
    &lt;/form&gt;
    
    &lt;ul class="todos"&gt;
        &lt;?php foreach ($todos as $todo): ?&gt;
            &lt;li class="todo-item"&gt;
                &lt;input type="checkbox" 
                       onchange="toggleTodo('&lt;?= $todo['id'] ?&gt;')"
                       &lt;?= $todo['completed'] ? 'checked' : '' ?&gt;&gt;
                &lt;span class="todo-text"&gt;
                    &lt;?= htmlspecialchars($todo['text']) ?&gt;
                &lt;/span&gt;
                &lt;button onclick="deleteTodo('&lt;?= $todo['id'] ?&gt;')"&gt;
                    Удалить
                &lt;/button&gt;
            &lt;/li&gt;
        &lt;?php endforeach; ?&gt;
    &lt;/ul&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>
            </div>
        </section>

        <section class="demo-section">
            <h2 class="h3 mb-4">Живой пример</h2>
            <div class="live-demo">
                <?php
                require_once __DIR__ . '/../vendor/autoload.php';
                require_once __DIR__ . '/todo.php';
                ?>
            </div>
        </section>

        <section class="demo-section">
            <h2 class="h3 mb-4">Как это работает</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h5">1. Создание компонента</h3>
                            <p>Компонент наследуется от базового класса Component и реализует метод render()</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h5">2. Управление состоянием</h3>
                            <p>Состояние хранится в приватных свойствах компонента и обновляется через методы</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h5">3. Рендеринг</h3>
                            <p>Компонент рендерится в HTML с помощью шаблона и переданных данных</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h5">4. Обновление DOM</h3>
                            <p>При изменении состояния компонента DOM обновляется автоматически</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="h5">PHP Framework</h3>
                    <p>Проект по созданию PHP фреймворка с компонентным подходом</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>© 2024 Все права защищены</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
</body>

</html>