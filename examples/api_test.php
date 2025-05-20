<!DOCTYPE html>
<html lang="ru">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>API Тестирование - PHP Framework</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github.min.css">
     <style>
          body {
               font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
               line-height: 1.6;
               color: #333;
          }

          .endpoint-card {
               border: 1px solid #e9ecef;
               border-radius: 8px;
               margin-bottom: 2rem;
               background: #fff;
               box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
          }

          .endpoint-header {
               padding: 1.5rem;
               border-bottom: 1px solid #e9ecef;
          }

          .endpoint-body {
               padding: 1.5rem;
          }

          .method-badge {
               padding: 0.25rem 0.75rem;
               border-radius: 980px;
               font-size: 0.875rem;
               font-weight: 500;
               margin-right: 0.5rem;
          }

          .method-get {
               background: #e3f2fd;
               color: #1976d2;
          }

          .method-post {
               background: #e8f5e9;
               color: #2e7d32;
          }

          .method-put {
               background: #fff3e0;
               color: #f57c00;
          }

          .method-delete {
               background: #ffebee;
               color: #c62828;
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

          .form-group {
               margin-bottom: 1rem;
          }

          .form-group label {
               display: block;
               margin-bottom: 0.5rem;
               font-weight: 500;
          }

          .form-control {
               width: 100%;
               padding: 0.5rem;
               border: 1px solid #ced4da;
               border-radius: 4px;
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
                              <a class="nav-link" href="/components.php">Компоненты</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link active" href="/api_test.php">API</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>

     <main class="container my-5">
          <h1 class="display-4 mb-4">API Тестирование</h1>
          <p class="lead mb-5">Протестируйте API endpoints фреймворка</p>

          <ul class="nav nav-tabs" id="apiTabs" role="tablist">
               <li class="nav-item">
                    <a class="nav-link active" id="posts-tab" data-bs-toggle="tab" href="#posts" role="tab">Posts</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" id="comments-tab" data-bs-toggle="tab" href="#comments" role="tab">Comments</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" id="diary-tab" data-bs-toggle="tab" href="#diary" role="tab">Diary</a>
               </li>
          </ul>

          <div class="tab-content" id="apiTabsContent">
               <!-- Posts API -->
               <div class="tab-pane fade show active" id="posts" role="tabpanel">
                    <div class="endpoint-card">
                         <div class="endpoint-header">
                              <h3>
                                   <span class="method-badge method-get">GET</span>
                                   /api/posts
                              </h3>
                              <p class="text-muted mb-0">Получение списка постов</p>
                              <a href="/components#post" class="btn btn-sm btn-outline-primary mt-2">Посмотреть
                                   компонент</a>
                         </div>
                         <div class="endpoint-body">
                              <div class="row">
                                   <div class="col-md-6">
                                        <div class="code-preview">
                                             <h4>Пример запроса</h4>
                                             <pre><code class="language-php">fetch('/api/posts')
    .then(response => response.json())
    .then(data => console.log(data));</code></pre>
                                             <button class="run-button"
                                                  onclick="testEndpoint('posts', 'get')">Выполнить</button>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="result-preview">
                                             <h4>Результат</h4>
                                             <div id="posts-get-result">
                                                  <!-- Здесь будет результат выполнения -->
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="endpoint-card">
                         <div class="endpoint-header">
                              <h3>
                                   <span class="method-badge method-post">POST</span>
                                   /api/posts
                              </h3>
                              <p class="text-muted mb-0">Создание нового поста</p>
                         </div>
                         <div class="endpoint-body">
                              <div class="row">
                                   <div class="col-md-6">
                                        <div class="code-preview">
                                             <h4>Параметры запроса</h4>
                                             <div class="form-group">
                                                  <label for="post-title">Заголовок</label>
                                                  <input type="text" id="post-title" class="form-control"
                                                       value="Новый пост">
                                             </div>
                                             <div class="form-group">
                                                  <label for="post-content">Содержание</label>
                                                  <textarea id="post-content" class="form-control"
                                                       rows="3">Содержание нового поста</textarea>
                                             </div>
                                             <button class="run-button" onclick="testEndpoint('posts', 'post')">Создать
                                                  пост</button>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="result-preview">
                                             <h4>Результат</h4>
                                             <div id="posts-post-result">
                                                  <!-- Здесь будет результат выполнения -->
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <!-- Comments API -->
               <div class="tab-pane fade" id="comments" role="tabpanel">
                    <div class="endpoint-card">
                         <div class="endpoint-header">
                              <h3>
                                   <span class="method-badge method-post">POST</span>
                                   /api/posts/comment
                              </h3>
                              <p class="text-muted mb-0">Добавление комментария к посту</p>
                              <a href="/components#post" class="btn btn-sm btn-outline-primary mt-2">Посмотреть
                                   компонент</a>
                         </div>
                         <div class="endpoint-body">
                              <div class="row">
                                   <div class="col-md-6">
                                        <div class="code-preview">
                                             <h4>Параметры запроса</h4>
                                             <div class="form-group">
                                                  <label for="comment-post-id">ID поста</label>
                                                  <input type="text" id="comment-post-id" class="form-control"
                                                       value="1">
                                             </div>
                                             <div class="form-group">
                                                  <label for="comment-content">Комментарий</label>
                                                  <textarea id="comment-content" class="form-control"
                                                       rows="3">Отличный пост!</textarea>
                                             </div>
                                             <button class="run-button"
                                                  onclick="testEndpoint('comments', 'post')">Добавить
                                                  комментарий</button>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="result-preview">
                                             <h4>Результат</h4>
                                             <div id="comments-post-result">
                                                  <!-- Здесь будет результат выполнения -->
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <!-- Diary API -->
               <div class="tab-pane fade" id="diary" role="tabpanel">
                    <div class="endpoint-card">
                         <div class="endpoint-header">
                              <h3>
                                   <span class="method-badge method-get">GET</span>
                                   /api/diary/entries
                              </h3>
                              <p class="text-muted mb-0">Получение записей дневника</p>
                              <a href="/components#diary" class="btn btn-sm btn-outline-primary mt-2">Посмотреть
                                   компонент</a>
                         </div>
                         <div class="endpoint-body">
                              <div class="row">
                                   <div class="col-md-6">
                                        <div class="code-preview">
                                             <h4>Пример запроса</h4>
                                             <pre><code class="language-php">fetch('/api/diary/entries')
    .then(response => response.json())
    .then(data => console.log(data));</code></pre>
                                             <button class="run-button"
                                                  onclick="testEndpoint('diary', 'get')">Выполнить</button>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="result-preview">
                                             <h4>Результат</h4>
                                             <div id="diary-get-result">
                                                  <!-- Здесь будет результат выполнения -->
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="endpoint-card">
                         <div class="endpoint-header">
                              <h3>
                                   <span class="method-badge method-post">POST</span>
                                   /api/diary/entries
                              </h3>
                              <p class="text-muted mb-0">Создание новой записи в дневнике</p>
                         </div>
                         <div class="endpoint-body">
                              <div class="row">
                                   <div class="col-md-6">
                                        <div class="code-preview">
                                             <h4>Параметры запроса</h4>
                                             <div class="form-group">
                                                  <label for="diary-title">Заголовок</label>
                                                  <input type="text" id="diary-title" class="form-control"
                                                       value="Мой день">
                                             </div>
                                             <div class="form-group">
                                                  <label for="diary-content">Содержание</label>
                                                  <textarea id="diary-content" class="form-control"
                                                       rows="3">Сегодня я...</textarea>
                                             </div>
                                             <button class="run-button" onclick="testEndpoint('diary', 'post')">Создать
                                                  запись</button>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="result-preview">
                                             <h4>Результат</h4>
                                             <div id="diary-post-result">
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

          function testEndpoint(type, method) {
               const resultBlock = document.getElementById(`${type}-${method}-result`);
               const button = event.target;

               // Показываем индикатор загрузки
               resultBlock.innerHTML = '<div class="loading"></div>';
               button.disabled = true;

               let requestOptions = {
                    method: method.toUpperCase()
               };

               // Добавляем тело запроса для POST запросов
               if (method === 'post') {
                    let data = {};
                    switch (type) {
                         case 'posts':
                              data = {
                                   title: document.getElementById('post-title').value,
                                   content: document.getElementById('post-content').value
                              };
                              break;
                         case 'comments':
                              data = {
                                   post_id: document.getElementById('comment-post-id').value,
                                   content: document.getElementById('comment-content').value
                              };
                              break;
                         case 'diary':
                              data = {
                                   title: document.getElementById('diary-title').value,
                                   content: document.getElementById('diary-content').value
                              };
                              break;
                    }
                    requestOptions.headers = {
                         'Content-Type': 'application/json'
                    };
                    requestOptions.body = JSON.stringify(data);
               }

               // Выполняем запрос к API
               fetch(`/api/${type}`, requestOptions)
                    .then(response => response.json())
                    .then(data => {
                         // Форматируем результат
                         let resultHtml = '<div class="alert alert-success">Запрос успешно выполнен!</div>';
                         resultHtml += '<pre><code>' + JSON.stringify(data, null, 2) + '</code></pre>';
                         resultBlock.innerHTML = resultHtml;
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