<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Auth\Auth;

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

session_start();

// Если пользователь уже авторизован, перенаправляем на главную
$auth = Auth::getInstance();
if ($auth->isAuthenticated()) {
    header('Location: /examples/posts.php');
    exit;
}

// Обработка формы авторизации
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($auth->login($username, $password)) {
        header('Location: /examples/posts.php');
        exit;
    } else {
        $error = 'Неверное имя пользователя или пароль';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход - PHP Framework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 800px;
            margin: 50px auto;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #0071e3;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 1.5rem;
        }

        .btn-primary {
            background: #0071e3;
            border: none;
            border-radius: 980px;
            padding: 0.5rem 1.5rem;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background: #0077ed;
            transform: translateY(-1px);
        }

        .feature-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            background: white;
            transition: transform 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2rem;
            color: #0071e3;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="mb-0">Вход в систему</h3>
                        </div>
                        <div class="card-body p-4">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= htmlspecialchars($error) ?>
                                </div>
                            <?php endif; ?>

                            <form method="POST" action="/examples/login.php">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Имя пользователя</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Пароль</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Войти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-4">Основные возможности</h4>

                    <div class="feature-card">
                        <div class="feature-icon">🔐</div>
                        <h5>Авторизация</h5>
                        <p class="text-muted mb-0">Безопасная система аутентификации с поддержкой сессий</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">📝</div>
                        <h5>Посты и комментарии</h5>
                        <p class="text-muted mb-0">Создание постов и управление комментариями</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">📔</div>
                        <h5>Личный дневник</h5>
                        <p class="text-muted mb-0">Создавайте и управляйте личными записями</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>