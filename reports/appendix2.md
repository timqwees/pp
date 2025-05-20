# Приложение 2
# Примеры использования компонентов

## 1. Компонент Auth

### Инициализация
```php
use PhpFramework\Components\Auth\Auth;

// Получение экземпляра компонента
$auth = Auth::getInstance();
```

### Авторизация пользователя
```php
// Вход в систему
$result = $auth->login([
    'email' => 'user@example.com',
    'password' => 'password'
]);

if ($result) {
    echo "Успешный вход";
} else {
    echo "Ошибка авторизации";
}
```

### Проверка авторизации
```php
// Проверка статуса авторизации
if ($auth->isAuthenticated()) {
    $userId = $auth->getUserId();
    echo "Пользователь авторизован, ID: " . $userId;
} else {
    echo "Пользователь не авторизован";
}
```

### Выход из системы
```php
// Завершение сессии
$auth->logout();
echo "Выход выполнен успешно";
```

## 2. Компонент Post

### Создание поста
```php
use PhpFramework\Components\Post\Post;

// Создание нового поста
$post = new Post([
    'title' => 'Новый пост',
    'content' => 'Содержание поста',
    'author_id' => 1
]);

// Сохранение поста
$postId = $post->save();
echo "Пост создан, ID: " . $postId;
```

### Добавление комментария
```php
// Добавление комментария к посту
$comment = $post->addComment([
    'content' => 'Отличный пост!',
    'author_id' => 2
]);

echo "Комментарий добавлен, ID: " . $comment->id;
```

### Получение комментариев
```php
// Получение всех комментариев поста
$comments = $post->getComments();

foreach ($comments as $comment) {
    echo "Комментарий: " . $comment->content;
    echo "Автор: " . $comment->author_id;
}
```

## 3. Компонент Diary

### Создание записи
```php
use PhpFramework\Components\Diary\Diary;

// Инициализация дневника
$diary = new Diary($userId);

// Добавление новой записи
$entry = $diary->addEntry([
    'title' => 'Мой день',
    'content' => 'Сегодня я...',
    'created_at' => date('Y-m-d H:i:s')
]);

echo "Запись создана, ID: " . $entry->id;
```

### Получение записей
```php
// Получение всех записей
$entries = $diary->getEntries();

foreach ($entries as $entry) {
    echo "Заголовок: " . $entry->title;
    echo "Содержание: " . $entry->content;
    echo "Дата: " . $entry->created_at;
}
```

### Фильтрация записей
```php
// Получение записей за определенный период
$entries = $diary->getEntries([
    'start_date' => '2024-03-01',
    'end_date' => '2024-03-31'
]);
```

## 4. Интеграция компонентов

### Пример использования нескольких компонентов
```php
use PhpFramework\Components\Auth\Auth;
use PhpFramework\Components\Post\Post;
use PhpFramework\Components\Diary\Diary;

// Инициализация компонентов
$auth = Auth::getInstance();
$post = new Post();
$diary = new Diary($auth->getUserId());

// Проверка авторизации
if ($auth->isAuthenticated()) {
    // Создание поста
    $postId = $post->save([
        'title' => 'Новый пост',
        'content' => 'Содержание поста',
        'author_id' => $auth->getUserId()
    ]);

    // Добавление записи в дневник
    $diary->addEntry([
        'title' => 'Создан новый пост',
        'content' => 'ID поста: ' . $postId
    ]);
}
```

### Обработка событий
```php
// Подписка на событие создания поста
$post->on('created', function($postId) use ($diary) {
    $diary->addEntry([
        'title' => 'Создан новый пост',
        'content' => 'ID поста: ' . $postId
    ]);
});

// Создание поста (вызовет событие)
$post->save([
    'title' => 'Новый пост',
    'content' => 'Содержание поста'
]);
``` 