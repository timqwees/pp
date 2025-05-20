<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Components\Auth\Auth;
use App\Components\Diary\Diary;

// Инициализация компонентов
$auth = Auth::getInstance();
$userId = $auth->getUserId();

if (!$userId) {
  header('Location: /login.php');
  exit;
}

$diary = new Diary($userId);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Личный кабинет - PHP Framework</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
      line-height: 1.6;
      color: #333;
    }

    .diary-entry {
      transition: all 0.3s;
      border: 1px solid #e9ecef;
      border-radius: 8px;
      margin-bottom: 1rem;
      background: #fff;
    }

    .diary-entry:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

    .btn-secondary {
      background: #6c757d;
      border: none;
      border-radius: 980px;
      padding: 0.5rem 1.5rem;
      transition: all 0.2s;
    }

    .btn-secondary:hover {
      background: #5a6268;
      transform: translateY(-1px);
    }

    .loading {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100px;
    }

    .loading::after {
      content: '';
      width: 2rem;
      height: 2rem;
      border: 3px solid #f3f3f3;
      border-top: 3px solid #0071e3;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">PHP Framework</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="/dashboard">Ежедневник</a></li>
          <li class="nav-item"><a class="nav-link" href="/posts">Посты</a></li>
          <li class="nav-item"><a class="nav-link" href="/logout">Выйти</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Мой ежедневник</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newEntryModal">
              Новая запись
            </button>
          </div>
          <div class="card-body">
            <?php foreach ($diary->getEntries() as $entry): ?>
              <div class="diary-entry p-3 mb-3 border rounded">
                <h5><?= htmlspecialchars($entry['title']) ?></h5>
                <p><?= htmlspecialchars($entry['content']) ?></p>
                <small class="text-muted">
                  <?= date('d.m.Y H:i', strtotime($entry['created_at'])) ?>
                </small>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4>Статистика</h4>
          </div>
          <div class="card-body">
            <p>Всего записей: <?= count($diary->getEntries()) ?></p>
            <p>Последняя запись: <?= date('d.m.Y', strtotime($diary->getEntries()[0]['created_at'] ?? 'now')) ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Модальное окно для новой записи -->
  <div class="modal fade" id="newEntryModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Новая запись</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="newEntryForm">
            <div class="mb-3">
              <label for="title" class="form-label">Заголовок</label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Содержание</label>
              <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
          <button type="button" class="btn btn-primary" onclick="saveEntry()">Сохранить</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function saveEntry() {
      const form = document.getElementById('newEntryForm');
      const formData = new FormData(form);

      fetch('/api/diary/entry', {
        method: 'POST',
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            location.reload();
          }
        });
    }
  </script>
</body>

</html>