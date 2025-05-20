# Документация PHP Framework

## Компоненты

### Auth
Компонент для управления аутентификацией и авторизацией.

```php
use PhpFramework\Components\Auth\Auth;

$auth = Auth::getInstance();

// Проверка авторизации
if ($auth->isAuthenticated()) {
    $userId = $auth->getUserId();
}

// Вход в систему
$auth->login([
    'email' => 'user@example.com',
    'password' => 'password'
]);

// Выход из системы
$auth->logout();
```

### Post
Компонент для работы с постами и комментариями.

```php
use PhpFramework\Components\Post\Post;

// Создание поста
$post = new Post([
    'title' => 'Новый пост',
    'content' => 'Содержание поста'
]);

// Добавление комментария
$post->addComment([
    'content' => 'Отличный пост!'
]);

// Получение комментариев
$comments = $post->getComments();
```

### Diary
Компонент для ведения личного дневника.

```php
use PhpFramework\Components\Diary\Diary;

$diary = new Diary($userId);

// Добавление записи
$entry = $diary->addEntry([
    'title' => 'Мой день',
    'content' => 'Сегодня я...'
]);

// Получение записей
$entries = $diary->getEntries();
```

## API Endpoints

### Posts API

#### GET /api/posts
Получение списка постов.

**Ответ:**
```json
{
    "success": true,
    "posts": [
        {
            "id": "1",
            "title": "Тестовый пост",
            "content": "Содержание поста",
            "author_id": 1,
            "created_at": "2024-03-20 12:00:00"
        }
    ]
}
```

#### POST /api/posts
Создание нового поста.

**Параметры:**
- `title` (string) - заголовок поста
- `content` (string) - содержание поста

**Ответ:**
```json
{
    "success": true,
    "post": {
        "id": "2",
        "title": "Новый пост",
        "content": "Содержание нового поста",
        "author_id": 1,
        "created_at": "2024-03-20 12:30:00"
    }
}
```

### Comments API

#### POST /api/posts/comment
Добавление комментария к посту.

**Параметры:**
- `post_id` (string) - ID поста
- `content` (string) - текст комментария

**Ответ:**
```json
{
    "success": true,
    "comment": {
        "id": "1",
        "post_id": "1",
        "content": "Отличный пост!",
        "author_id": 1,
        "created_at": "2024-03-20 12:35:00"
    }
}
```

### Diary API

#### GET /api/diary/entries
Получение записей дневника.

**Ответ:**
```json
{
    "success": true,
    "entries": [
        {
            "id": "1",
            "title": "Мой день",
            "content": "Сегодня я...",
            "created_at": "2024-03-20 12:00:00"
        }
    ]
}
```

#### POST /api/diary/entries
Создание новой записи в дневнике.

**Параметры:**
- `title` (string) - заголовок записи
- `content` (string) - содержание записи

**Ответ:**
```json
{
    "success": true,
    "entry": {
        "id": "2",
        "title": "Новая запись",
        "content": "Содержание записи",
        "created_at": "2024-03-20 12:40:00"
    }
}
```

## Демо-интерфейс

### Компоненты
Страница `/components.php` предоставляет интерактивный интерфейс для тестирования компонентов:
- Auth - проверка авторизации
- Post - создание постов и комментариев
- Diary - добавление записей в дневник

### API Тестирование
Страница `/api_test.php` позволяет тестировать все API endpoints:
- Posts API - получение и создание постов
- Comments API - добавление комментариев
- Diary API - управление записями дневника

### Демо-панель
Страница `/demo.php` демонстрирует основные возможности фреймворка:
- Навигация между разделами
- Демонстрация компонентов
- Тестирование API 