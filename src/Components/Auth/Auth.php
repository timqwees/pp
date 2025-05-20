<?php

namespace PhpFramework\Components\Auth;

class Auth
{
 private static ?self $instance = null;
 private ?array $user = null;
 private string $sessionKey = 'auth_user';

 private function __construct()
 {
  if (isset($_SESSION[$this->sessionKey])) {
   $this->user = $_SESSION[$this->sessionKey];
  }
 }

 public static function getInstance(): self
 {
  if (self::$instance === null) {
   self::$instance = new self();
  }
  return self::$instance;
 }

 public function login(array $credentials): bool
 {
  // Здесь должна быть проверка учетных данных в базе данных
  // Для примера просто проверяем наличие email и password
  if (isset($credentials['email']) && isset($credentials['password'])) {
   $this->user = [
    'id' => 1, // В реальном приложении ID будет из базы данных
    'email' => $credentials['email'],
    'name' => 'Test User'
   ];
   $_SESSION[$this->sessionKey] = $this->user;
   return true;
  }
  return false;
 }

 public function logout(): void
 {
  $this->user = null;
  unset($_SESSION[$this->sessionKey]);
 }

 public function isAuthenticated(): bool
 {
  return $this->user !== null;
 }

 public function getUser(): ?array
 {
  return $this->user;
 }

 public function getUserId(): ?int
 {
  return $this->user['id'] ?? null;
 }

 public function check(): bool
 {
  return $this->isAuthenticated();
 }
}