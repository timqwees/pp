<?php

namespace App\Core;

class Router
{
 private array $routes = [];
 private array $middlewares = [];
 private ?string $currentRoute = null;

 public function get(string $path, callable|array $handler, array $middlewares = []): self
 {
  $this->addRoute('GET', $path, $handler, $middlewares);
  return $this;
 }

 public function post(string $path, callable|array $handler, array $middlewares = []): self
 {
  $this->addRoute('POST', $path, $handler, $middlewares);
  return $this;
 }

 public function put(string $path, callable|array $handler, array $middlewares = []): self
 {
  $this->addRoute('PUT', $path, $handler, $middlewares);
  return $this;
 }

 public function delete(string $path, callable|array $handler, array $middlewares = []): self
 {
  $this->addRoute('DELETE', $path, $handler, $middlewares);
  return $this;
 }

 private function addRoute(string $method, string $path, callable|array $handler, array $middlewares): void
 {
  $this->routes[$method][$path] = [
   'handler' => $handler,
   'middlewares' => $middlewares
  ];
 }

 public function middleware(string $name, callable $handler): self
 {
  $this->middlewares[$name] = $handler;
  return $this;
 }

 public function dispatch(string $method, string $path): mixed
 {
  if (!isset($this->routes[$method][$path])) {
   throw new \Exception("Route not found: $method $path");
  }

  $route = $this->routes[$method][$path];
  $this->currentRoute = $path;

  // Apply middlewares
  foreach ($route['middlewares'] as $middleware) {
   if (isset($this->middlewares[$middleware])) {
    $this->middlewares[$middleware]();
   }
  }

  $handler = $route['handler'];
  if (is_array($handler)) {
   [$class, $method] = $handler;
   $instance = new $class();
   return $instance->$method();
  }

  return $handler();
 }

 public function getCurrentRoute(): ?string
 {
  return $this->currentRoute;
 }
}