# Приложение 3
# Документация по API

## Posts API

### GET /api/posts
Получение списка постов.

#### Параметры запроса
- `page` (опционально) - номер страницы (по умолчанию 1)
- `limit` (опционально) - количество постов на странице (по умолчанию 10)
- `sort` (опционально) - поле для сортировки (created_at, title)
- `order` (опционально) - порядок сортировки (asc, desc)

#### Пример запроса
```bash
curl -X GET "http://localhost:8000/api/posts?page=1&limit=10&sort=created_at&order=desc"
```

#### Пример ответа
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
    ],
    "pagination": {
        "current_page": 1,
        "total_pages": 5,
        "total_items": 50
    }
}
```

### POST /api/posts
Создание нового поста.

#### Параметры запроса
- `title` (обязательно) - заголовок поста
- `content` (обязательно) - содержание поста
- `author_id` (обязательно) - ID автора

#### Пример запроса
```bash
curl -X POST "http://localhost:8000/api/posts" \
     -H "Content-Type: application/json" \
     -d '{
         "title": "Новый пост",
         "content": "Содержание нового поста",
         "author_id": 1
     }'
```

#### Пример ответа
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

## Comments API

### POST /api/posts/comment
Добавление комментария к посту.

#### Параметры запроса
- `post_id` (обязательно) - ID поста
- `content` (обязательно) - текст комментария
- `author_id` (обязательно) - ID автора комментария

#### Пример запроса
```bash
curl -X POST "http://localhost:8000/api/posts/comment" \
     -H "Content-Type: application/json" \
     -d '{
         "post_id": "1",
         "content": "Отличный пост!",
         "author_id": 2
     }'
```

#### Пример ответа
```json
{
    "success": true,
    "comment": {
        "id": "1",
        "post_id": "1",
        "content": "Отличный пост!",
        "author_id": 2,
        "created_at": "2024-03-20 12:35:00"
    }
}
```

## Diary API

### GET /api/diary/entries
Получение записей дневника.

#### Параметры запроса
- `user_id` (обязательно) - ID пользователя
- `start_date` (опционально) - начальная дата
- `end_date` (опционально) - конечная дата
- `page` (опционально) - номер страницы
- `limit` (опционально) - количество записей на странице

#### Пример запроса
```bash
curl -X GET "http://localhost:8000/api/diary/entries?user_id=1&start_date=2024-03-01&end_date=2024-03-31"
```

#### Пример ответа
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
    ],
    "pagination": {
        "current_page": 1,
        "total_pages": 3,
        "total_items": 25
    }
}
```

### POST /api/diary/entries
Создание новой записи в дневнике.

#### Параметры запроса
- `user_id` (обязательно) - ID пользователя
- `title` (обязательно) - заголовок записи
- `content` (обязательно) - содержание записи

#### Пример запроса
```bash
curl -X POST "http://localhost:8000/api/diary/entries" \
     -H "Content-Type: application/json" \
     -d '{
         "user_id": 1,
         "title": "Новая запись",
         "content": "Содержание записи"
     }'
```

#### Пример ответа
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

## Коды ответов

### Успешные ответы
- `200 OK` - запрос успешно выполнен
- `201 Created` - ресурс успешно создан

### Ошибки клиента
- `400 Bad Request` - неверный формат запроса
- `401 Unauthorized` - требуется авторизация
- `403 Forbidden` - нет прав доступа
- `404 Not Found` - ресурс не найден
- `422 Unprocessable Entity` - ошибка валидации

### Ошибки сервера
- `500 Internal Server Error` - внутренняя ошибка сервера

## Обработка ошибок

### Пример ответа с ошибкой
```json
{
    "success": false,
    "error": {
        "code": 400,
        "message": "Неверный формат запроса",
        "details": {
            "title": "Поле обязательно для заполнения",
            "content": "Поле обязательно для заполнения"
        }
    }
}
``` 