<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Компоненты - PHP Framework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github.min.css">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .component-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            margin-bottom: 2rem;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .component-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        .component-body {
            padding: 1.5rem;
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

        .run-button:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .loading {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
        }

        .loading::after {
            content: '';
            width: 2rem;
            height: 2rem;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #0071e3;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .nav-tabs {
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 1.5rem;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
            padding: 0.75rem 1.5rem;
            border-radius: 980px;
            margin-right: 0.5rem;
        }

        .nav-tabs .nav-link.active {
            background: #0071e3;
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
                        <a class="nav-link" href="/demo.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/components.php">Компоненты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/api_test.php">API</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <h1 class="display-4 mb-4">Компоненты</h1>
        <p class="lead mb-5">Изучите и протестируйте основные компоненты фреймворка</p>

        <ul class="nav nav-tabs" id="componentTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="auth-tab" data-bs-toggle="tab" href="#auth" role="tab">Auth</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="post-tab" data-bs-toggle="tab" href="#post" role="tab">Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="diary-tab" data-bs-toggle="tab" href="#diary" role="tab">Diary</a>
            </li>
        </ul>

        <div class="tab-content" id="componentTabsContent">
            <!-- Auth Component -->
            <div class="tab-pane fade show active" id="auth" role="tabpanel">
                <div class="component-card">
                    <div class="component-header">
                        <h3>Компонент Auth</h3>
                        <p class="text-muted mb-0">Управление аутентификацией и авторизацией</p>
                        <a href="/api_test.php#auth" class="btn btn-sm btn-outline-primary mt-2">Тестировать API</a>
                    </div>
                    <div class="component-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="code-preview">
                                    <h4>Пример использования</h4>
                                    <pre><code class="language-php">// Инициализация
$auth = Auth::getInstance();

// Проверка авторизации
if ($auth->isAuthenticated()) {
    $userId = $auth->getUserId();
}

// Вход в систему
$auth->login($email, $password);

// Выход из системы
$auth->logout();</code></pre>
                                    <button class="run-button" onclick="runComponent('auth', 'check')">Проверить
                                        авторизацию</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="result-preview">
                                    <h4>Результат</h4>
                                    <div id="auth-result">
                                        <!-- Здесь будет результат выполнения -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Post Component -->
            <div class="tab-pane fade" id="post" role="tabpanel">
                <div class="component-card">
                    <div class="component-header">
                        <h3>Компонент Post</h3>
                        <p class="text-muted mb-0">Управление постами и комментариями</p>
                        <a href="/api_test.php#posts" class="btn btn-sm btn-outline-primary mt-2">Тестировать API</a>
                    </div>
                    <div class="component-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="code-preview">
                                    <h4>Пример использования</h4>
                                    <pre><code class="language-php">// Создание поста
$post = new Post([
    'title' => 'Новый пост',
    'content' => 'Содержание поста'
]);

// Добавление комментария
$post->addComment([
    'content' => 'Отличный пост!'
]);

// Получение комментариев
$comments = $post->getComments();</code></pre>
                                    <button class="run-button" onclick="runComponent('post', 'create')">Создать
                                        пост</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="result-preview">
                                    <h4>Результат</h4>
                                    <div id="post-result">
                                        <!-- Здесь будет результат выполнения -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diary Component -->
            <div class="tab-pane fade" id="diary" role="tabpanel">
                <div class="component-card">
                    <div class="component-header">
                        <h3>Компонент Diary</h3>
                        <p class="text-muted mb-0">Управление личным дневником</p>
                        <a href="/api_test.php#diary" class="btn btn-sm btn-outline-primary mt-2">Тестировать API</a>
                    </div>
                    <div class="component-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="code-preview">
                                    <h4>Пример использования</h4>
                                    <pre><code class="language-php">// Создание дневника
$diary = new Diary($userId);

// Добавление записи
$entry = $diary->addEntry([
    'title' => 'Мой день',
    'content' => 'Сегодня я...'
]);

// Получение записей
$entries = $diary->getEntries();</code></pre>
                                    <button class="run-button" onclick="runComponent('diary', 'create')">Создать
                                        запись</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="result-preview">
                                    <h4>Результат</h4>
                                    <div id="diary-result">
                                        <!-- Здесь будет результат выполнения -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();

        function runComponent(type, action) {
            const resultBlock = document.getElementById(`${type}-result`);
            const button = event.target;

            // Показываем индикатор загрузки
            resultBlock.innerHTML = '<div class="loading"></div>';
            button.disabled = true;

            // Выполняем запрос к API
            fetch(`/run_component.php?component=${type}&action=${action}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Форматируем результат
                        let resultHtml = '<div class="alert alert-success">Компонент успешно выполнен!</div>';
                        resultHtml += '<pre><code>' + JSON.stringify(data.result, null, 2) + '</code></pre>';
                        resultBlock.innerHTML = resultHtml;
                    } else {
                        resultBlock.innerHTML = '<div class="alert alert-danger">Ошибка: ' + data.error + '</div>';
                    }
                })
                .catch(error => {
                    resultBlock.innerHTML = '<div class="alert alert-danger">Ошибка выполнения: ' + error.message + '</div>';
                })
                .finally(() => {
                    button.disabled = false;
                });
        }
    </script>
</body>

</html>