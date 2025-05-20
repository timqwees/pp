<?php

namespace App\Components\Auth;

class Auth
{
 private static ?Auth $instance = null;
 private ?array $user = null;

 private function __construct()
 {
  // Инициализация сессии
  if (session_status() === PHP_SESSION_NONE) {
   session_start();
  }

  // Проверяем, есть ли данные пользователя в сессии
  if (isset($_SESSION['user'])) {
   $this->user = $_SESSION['user'];
  }
 }

 public static function getInstance(): self
 {
  if (self::$instance === null) {
   self::$instance = new self();
  }
  return self::$instance;
 }

 public function login(string $username, string $password): bool
 {
  // TODO: В реальном приложении здесь должна быть проверка с базой данных
  // Для демонстрации используем тестовые учетные данные
  if ($username === 'admin' && $password === 'admin') {
   $this->user = [
    'id' => 1,
    'username' => $username,
    'role' => 'admin'
   ];
   $_SESSION['user'] = $this->user;
   return true;
  }
  return false;
 }

 public function logout(): void
 {
  $this->user = null;
  unset($_SESSION['user']);
  session_destroy();
 }

 public function isAuthenticated(): bool
 {
  return $this->user !== null;
 }

 public function getUserId(): ?int
 {
  return $this->user['id'] ?? null;
 }

 public function getUsername(): ?string
 {
  return $this->user['username'] ?? null;
 }

 public function getRole(): ?string
 {
  return $this->user['role'] ?? null;
 }

 public function getUser(): ?array
 {
  return $this->user;
 }
}