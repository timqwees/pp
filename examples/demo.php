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

        .tutorial-step {
            padding: 1.5rem;
            margin-bottom: 1rem;
            background: #fff;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .tutorial-step:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .api-endpoint {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .api-method {
            font-weight: bold;
            color: #0071e3;
        }

        .preview-section {
            padding: 2rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .preview-tabs {
            margin-bottom: 2rem;
        }

        .preview-tabs .nav-link {
            color: #515154;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            margin-right: 0.5rem;
            transition: all 0.2s;
        }

        .preview-tabs .nav-link:hover {
            background: #f8f9fa;
        }

        .preview-tabs .nav-link.active {
            background: #0071e3;
            color: #fff;
        }

        .preview-content {
            display: none;
        }

        .preview-content.active {
            display: block;
        }

        .code-preview {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
        }

        .result-preview {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
            min-height: 200px;
        }

        .run-button {
            background: #0071e3;
            color: #fff;
            border: none;
            border-radius: 980px;
            padding: 0.5rem 1.5rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .run-button:hover {
            background: #0077ed;
            transform: translateY(-1px);
        }

        .results-section {
            padding: 2rem 0;
            background: #f8f9fa;
            border-radius: 8px;
            margin: 2rem 0;
        }

        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(550px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .result-card {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            transition: all 0.2s;
        }

        .result-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .result-card h3 {
            color: #1d1d1f;
            margin-bottom: 1rem;
        }

        .result-card p {
            color: #515154;
            margin-bottom: 1.5rem;
        }

        .view-button {
            display: inline-block;
            background: #0071e3;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1.5rem;
            border-radius: 980px;
            transition: all 0.2s;
        }

        .view-button:hover {
            background: #0077ed;
            color: #fff;
            transform: translateY(-1px);
        }

        .demo-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            margin-bottom: 2rem;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }

        .demo-card:hover {
            transform: translateY(-2px);
        }

        .demo-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        .demo-body {
            padding: 1.5rem;
        }

        .demo-button {
            background: #0071e3;
            color: #fff;
            border: none;
            border-radius: 980px;
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .demo-button:hover {
            background: #0077ed;
            transform: translateY(-1px);
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/demo.php">PHP Framework</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Возможности</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#preview">Предпросмотр</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#results">Результаты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#api">API</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reault">Result</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <section id="preview" class="preview-section">
            <h1 class="display-4 mb-4">Интерактивный предпросмотр</h1>
            <p class="lead">Запускайте примеры и смотрите результаты в реальном времени</p>

            <div class="preview-tabs">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#components-preview" data-bs-toggle="tab">Компоненты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#routing-preview" data-bs-toggle="tab">Роутинг</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#auth-preview" data-bs-toggle="tab">Аутентификация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#templates-preview" data-bs-toggle="tab">Шаблоны</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="components-preview">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="code-preview">
                                <h3>Пример компонента</h3>
                                <pre><code class="language-php">class TodoList extends Component {
    private array $todos = [];
    
    public function render(): string {
        return $this->view('todo-list', [
            'todos' => $this->todos
        ]);
    }
}</code></pre>
                                <button class="run-button" onclick="runPreview('component')">Запустить</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="result-preview">
                                <h3>Результат</h3>
                                <div id="component-result"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="routing-preview">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="code-preview">
                                <h3>Пример роутинга</h3>
                                <pre><code class="language-php">$router->get('/posts', [PostController::class, 'index']);
$router->post('/posts', [PostController::class, 'store'])
    ->middleware('auth');</code></pre>
                                <button class="run-button" onclick="runPreview('routing')">Запустить</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="result-preview">
                                <h3>Результат</h3>
                                <div id="routing-result"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="auth-preview">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="code-preview">
                                <h3>Пример аутентификации</h3>
                                <pre><code class="language-php">$auth = Auth::getInstance();
if ($auth->login([
    'email' => 'user@example.com',
    'password' => 'password'
])) {
    echo "Успешный вход";
}</code></pre>
                                <button class="run-button" onclick="runPreview('auth')">Запустить</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="result-preview">
                                <h3>Результат</h3>
                                <div id="auth-result"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="templates-preview">
                    <div class="preview-tabs">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#home-template" data-bs-toggle="tab">Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#login-template" data-bs-toggle="tab">Вход</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#dashboard-template" data-bs-toggle="tab">Личный кабинет</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#posts-template" data-bs-toggle="tab">Посты</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home-template">
                            <div class="result-preview">
                                <iframe src="/templates/home.php"
                                    style="width: 100%; height: 500px; border: none;"></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="login-template">
                            <div class="result-preview">
                                <iframe src="/templates/login.php"
                                    style="width: 100%; height: 500px; border: none;"></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dashboard-template">
                            <div class="result-preview">
                                <iframe src="/templates/dashboard.php"
                                    style="width: 100%; height: 500px; border: none;"></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="posts-template">
                            <div class="result-preview">
                                <iframe src="/templates/posts.php"
                                    style="width: 100%; height: 500px; border: none;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="demo-section">
            <h1 class="display-4 mb-4">PHP Framework</h1>
            <p class="lead">Современный фреймворк для создания веб-приложений с компонентным подходом</p>

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="feature-card">
                        <h3>Компонентный подход</h3>
                        <p>Создавайте переиспользуемые компоненты с собственной логикой и состоянием</p>
                        <div class="code-block">
                            <pre><code class="language-php">class Post extends Component {
    private string $title;
    private string $content;
    
    public function render(): string {
        return $this->view('post', [
            'title' => $this->title,
            'content' => $this->content
        ]);
    }
}</code></pre>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <h3>Роутинг</h3>
                        <p>Простая и гибкая система маршрутизации с поддержкой middleware</p>
                        <div class="code-block">
                            <pre><code class="language-php">$router->get('/posts', [PostController::class, 'index']);
$router->post('/posts', [PostController::class, 'store'])
    ->middleware('auth');</code></pre>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <h3>Аутентификация</h3>
                        <p>Готовая система авторизации с поддержкой сессий</p>
                        <div class="code-block">
                            <pre><code class="language-php">$auth = Auth::getInstance();
if ($auth->login($credentials)) {
    // Успешная авторизация
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="api" class="demo-section">
            <h2 class="mb-4">API Endpoints</h2>

            <div class="api-endpoint">
                <h4>Посты</h4>
                <p><span class="api-method">GET</span> /api/posts - Получить список постов</p>
                <p><span class="api-method">POST</span> /api/posts - Создать новый пост</p>
                <p><span class="api-method">GET</span> /api/posts/{id} - Получить пост по ID</p>
                <p><span class="api-method">PUT</span> /api/posts/{id} - Обновить пост</p>
                <p><span class="api-method">DELETE</span> /api/posts/{id} - Удалить пост</p>
            </div>

            <div class="api-endpoint">
                <h4>Комментарии</h4>
                <p><span class="api-method">GET</span> /api/posts/{id}/comments - Получить комментарии к посту</p>
                <p><span class="api-method">POST</span> /api/posts/{id}/comments - Добавить комментарий</p>
            </div>

            <div class="api-endpoint">
                <h4>Ежедневник</h4>
                <p><span class="api-method">GET</span> /api/diary/entries - Получить записи</p>
                <p><span class="api-method">POST</span> /api/diary/entries - Создать запись</p>
                <p><span class="api-method">PUT</span> /api/diary/entries/{id} - Обновить запись</p>
                <p><span class="api-method">DELETE</span> /api/diary/entries/{id} - Удалить запись</p>
            </div>
        </section>

        <section id="examples" class="demo-section">
            <h2 class="mb-4">Примеры использования</h2>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>Создание поста</h3>
                            <div class="code-block">
                                <pre><code class="language-php">$post = new Post([
    'title' => 'Заголовок',
    'content' => 'Содержание поста',
    'author_id' => $auth->getUserId()
]);

// Сохранение поста
$post->save();</code></pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>Добавление комментария</h3>
                            <div class="code-block">
                                <pre><code class="language-php">$post->addComment([
    'content' => 'Текст комментария',
    'author_id' => $auth->getUserId()
]);</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="results" class="results-section">
            <h2 class="display-4 mb-4">Результаты работы</h2>
            <p class="lead">Просмотрите готовые страницы и компоненты в действии</p>

            <div class="results-grid">
                <div class="result-card">
                    <h3>Главная страница</h3>
                    <p>Демонстрация основных возможностей фреймворка</p>
                    <a href="/templates/home.php" class="view-button" target="_blank">Посмотреть</a>
                </div>

                <div class="result-card">
                    <h3>Страница входа</h3>
                    <p>Форма авторизации с валидацией</p>
                    <a href="/templates/login.php" class="view-button" target="_blank">Посмотреть</a>
                </div>

                <div class="result-card">
                    <h3>Личный кабинет</h3>
                    <p>Персональный раздел с дневником</p>
                    <a href="/templates/dashboard.php" class="view-button" target="_blank">Посмотреть</a>
                </div>

                <div class="result-card">
                    <h3>Страница постов</h3>
                    <p>Управление постами и комментариями</p>
                    <a href="/templates/posts.php" class="view-button" target="_blank">Посмотреть</a>
                </div>

                <div class="col-md-6">
                    <div class="demo-card">
                        <div class="demo-header">
                            <h3>Компоненты</h3>
                            <p class="text-muted mb-0">Изучите и протестируйте основные компоненты фреймворка</p>
                        </div>
                        <div class="demo-body">
                            <p>В этом разделе вы можете:</p>
                            <ul>
                                <li>Просмотреть примеры использования компонентов</li>
                                <li>Протестировать функциональность компонентов</li>
                                <li>Изучить API компонентов</li>
                            </ul>
                            <a href="/components.php" class="demo-button">Перейти к компонентам</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="demo-card">
                        <div class="demo-header">
                            <h3>API</h3>
                            <p class="text-muted mb-0">Протестируйте API endpoints фреймворка</p>
                        </div>
                        <div class="demo-body">
                            <p>В этом разделе вы можете:</p>
                            <ul>
                                <li>Выполнить тестовые запросы к API</li>
                                <li>Просмотреть примеры запросов</li>
                                <li>Изучить структуру ответов</li>
                            </ul>
                            <a href="/api_test.php" class="demo-button">Перейти к API</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer bg-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>PHP Framework</h3>
                    <p>Современный фреймворк для создания веб-приложений</p>
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

        function runPreview(type) {
            const resultBlock = document.getElementById(`${type}-result`);

            // Показываем индикатор загрузки
            resultBlock.innerHTML = '<div class="spinner-border text-primary" role="status"></div>';

            // Выполняем запрос к API
            fetch(`/run_example.php?example=${type}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Форматируем результат
                        let resultHtml = '<div class="alert alert-success">Пример успешно выполнен!</div>';
                        resultHtml += '<pre><code>' + JSON.stringify(data.result, null, 2) + '</code></pre>';
                        resultBlock.innerHTML = resultHtml;
                    } else {
                        resultBlock.innerHTML = '<div class="alert alert-danger">Ошибка: ' + data.error + '</div>';
                    }
                })
                .catch(error => {
                    resultBlock.innerHTML = '<div class="alert alert-danger">Ошибка выполнения: ' + error.message + '</div>';
                });
        }

        // Плавная прокрутка к разделам
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>