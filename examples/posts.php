<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Auth\Auth;
use App\Components\Post\Post;

// Проверяем авторизацию
$auth = Auth::getInstance();
if (!$auth->isAuthenticated()) {
 header('Location: /examples/login.php');
 exit;
}

$userId = $auth->getUserId();
$post = new Post($userId);

// Обработка создания нового поста
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $title = $_POST['title'] ?? '';
 $content = $_POST['content'] ?? '';

 if (!empty($title) && !empty($content)) {
  $post->createPost([
   'title' => $title,
   'content' => $content
  ]);
 }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Посты - PHP Framework</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
  body {
   font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
   line-height: 1.6;
   color: #333;
  }

  .post-card {
   border: 1px solid #e9ecef;
   border-radius: 8px;
   margin-bottom: 1.5rem;
   background: #fff;
   transition: all 0.3s;
  }

  .post-card:hover {
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
     <li class="nav-item"><a class="nav-link" href="/examples/templates/dashboard.php">Ежедневник</a></li>
     <li class="nav-item"><a class="nav-link active" href="/examples/posts.php">Посты</a></li>
     <li class="nav-item"><a class="nav-link" href="/examples/components.php">Компоненты</a></li>
     <li class="nav-item"><a class="nav-link" href="/examples/logout.php">Выйти</a></li>
    </ul>
   </div>
  </div>
 </nav>

 <div class="container mt-5">
  <div class="row">
   <div class="col-md-8">
    <h1 class="mb-4">Мои посты</h1>

    <?php foreach ($post->getPosts() as $postItem): ?>
     <div class="post-card p-4">
      <h3><?= htmlspecialchars($postItem['title']) ?></h3>
      <p><?= htmlspecialchars($postItem['content']) ?></p>
      <small class="text-muted">
       <?= date('d.m.Y H:i', strtotime($postItem['created_at'])) ?>
      </small>
     </div>
    <?php endforeach; ?>
   </div>

   <div class="col-md-4">
    <div class="card">
     <div class="card-header">
      <h4>Создать новый пост</h4>
     </div>
     <div class="card-body">
      <form method="POST" action="/examples/posts.php">
       <div class="mb-3">
        <label for="title" class="form-label">Заголовок</label>
        <input type="text" class="form-control" id="title" name="title" required>
       </div>
       <div class="mb-3">
        <label for="content" class="form-label">Содержание</label>
        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Опубликовать</button>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>