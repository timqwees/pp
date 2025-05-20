<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Framework - Демо</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github.min.css">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .feature-card {
            transition: transform 0.2s;
            cursor: pointer;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            background: #fff;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">PHP Framework</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Посты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Войти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <section class="mb-5">
            <h1 class="display-4 mb-4">Демонстрация возможностей</h1>
            <p class="lead">Изучите основные функции фреймворка на примерах</p>
        </section>

        <section class="mb-5">
            <h2 class="mb-4">Интерактивные примеры</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="code-preview">
                        <h3>Пример создания поста</h3>
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
                        <button class="run-button" onclick="runExample('post')">Запустить</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="result-preview">
                        <h3>Результат</h3>
                        <div id="post-result">
                            <!-- Здесь будет результат выполнения -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="code-preview">
                        <h3>Пример работы с дневником</h3>
                        <pre><code class="language-php">// Создание записи в дневнике
$diary = new Diary($userId);
$entry = $diary->addEntry([
    'title' => 'Мой день',
    'content' => 'Сегодня я...'
]);

// Получение записей
$entries = $diary->getEntries();</code></pre>
                        <button class="run-button" onclick="runExample('diary')">Запустить</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="result-preview">
                        <h3>Результат</h3>
                        <div id="diary-result">
                            <!-- Здесь будет результат выполнения -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <h2 class="mb-4">Основные возможности</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <h3>Авторизация</h3>
                        <p>Безопасная система аутентификации с поддержкой сессий</p>
                        <a href="/login" class="btn btn-primary">Попробовать</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <h3>Посты и комментарии</h3>
                        <p>Создание постов и управление комментариями</p>
                        <a href="/posts" class="btn btn-primary">Перейти</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <h3>Личный дневник</h3>
                        <p>Создавайте и управляйте личными записями</p>
                        <a href="/dashboard" class="btn btn-primary">Открыть</a>
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

        function runExample(type) {
            const resultBlock = document.getElementById(`${type}-result`);
            const button = event.target;

            // Показываем индикатор загрузки
            resultBlock.innerHTML = '<div class="loading"></div>';
            button.disabled = true;

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
                })
                .finally(() => {
                    button.disabled = false;
                });
        }
    </script>
</body>

</html>