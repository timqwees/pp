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
      transition: transform 0.3s;
      border: 1px solid #e9ecef;
      border-radius: 8px;
      margin-bottom: 1.5rem;
    }

    .post-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .comment-section {
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 1.5rem;
      margin-top: 1rem;
    }

    .comment {
      background: #fff;
      border: 1px solid #e9ecef;
      border-radius: 8px;
      padding: 1rem;
      margin-bottom: 1rem;
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

    .btn-outline-primary {
      border-color: #0071e3;
      color: #0071e3;
      border-radius: 980px;
      padding: 0.5rem 1.5rem;
      transition: all 0.2s;
    }

    .btn-outline-primary:hover {
      background: #0071e3;
      color: #fff;
      transform: translateY(-1px);
    }

    .loading {
      display: flex;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"><a class="navbar-brand" href="/">PHP Framework</a><button class="navbar-toggler"
        type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="/dashboard">Ежедневник</a></li>
          <li class="nav-item"><a class="nav-link active" href="/posts">Посты</a></li>
          <li class="nav-item"><a class="nav-link" href="/logout">Выйти</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
        <div class="card post-card mb-4">
          <div class="card-body">
            <h2 class="card-title"><?= htmlspecialchars($post->getTitle()) ?></h2>
            <p class="card-text"><?= htmlspecialchars($post->getContent()) ?></p>
            <div class="d-flex justify-content-between align-items-center"><small class="text-muted">Опубликовано:
                <?= date('d.m.Y H:i', strtotime($post->getCreatedAt())) ?>
              </small><button class="btn btn-outline-primary btn-sm" onclick="toggleComments()">Комментарии
                (<?= count($post->getComments()) ?>) </button></div>
            <div class="comment-section" id="comments" style="display: none;">
              <h5>Комментарии</h5>
              <?php foreach ($post->getComments() as $comment): ?>
                <div class="comment mb-3">
                  <p class="mb-1"><?= htmlspecialchars($comment['content']) ?></p><small class="text-muted">Автор:
                    <?= $comment['author_id'] ?>
                  </small>
                </div>
              <?php endforeach; ?>

              <form id="commentForm" class="mt-3">
                <div class="mb-3"><textarea class="form-control" id="commentContent" rows="2"
                    placeholder="Ваш комментарий..." required></textarea></div><button type="submit"
                  class="btn btn-primary btn-sm">Отправить</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4>Создать пост</h4>
          </div>
          <div class="card-body">
            <form id="newPostForm">
              <div class="mb-3"><label for="title" class="form-label">Заголовок</label><input type="text"
                  class="form-control" id="title" name="title" required></div>
              <div class="mb-3"><label for="content" class="form-label">Содержание</label><textarea class="form-control"
                  id="content" name="content" rows="4" required></textarea></div><button type="submit"
                class="btn btn-primary">Опубликовать</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>function toggleComments() {
      const comments = document.getElementById('comments');
      comments.style.display = comments.style.display === 'none' ? 'block' : 'none';
    }

    document.getElementById('commentForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const content = document.getElementById('commentContent').value;

      fetch('/api/posts/comment', {

        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        }

        ,
        body: JSON.stringify({
          content
        })

      }).then(response => response.json()).then(data => {
        if (data.success) {
          location.reload();
        }
      });
    });

    document.getElementById('newPostForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const formData = new FormData(this);

      fetch('/api/posts', {
        method: 'POST',
        body: formData

      }).then(response => response.json()).then(data => {
        if (data.success) {
          location.reload();
        }
      });
    });
  </script>
</body>

</html>