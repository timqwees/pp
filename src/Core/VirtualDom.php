<?php

namespace PhpFramework\Core;

class VirtualDom
{
 private array $tree = [];

 public function createElement(string $type, array $props = [], array $children = []): array
 {
  return [
   'type' => $type,
   'props' => $props,
   'children' => $children
  ];
 }

 public function render(array $vnode): string
 {
  if (is_string($vnode)) {
   return $vnode;
  }

  $type = $vnode['type'];
  $props = $vnode['props'] ?? [];
  $children = $vnode['children'] ?? [];

  $attributes = $this->renderAttributes($props);
  $renderedChildren = $this->renderChildren($children);

  return "<{$type}{$attributes}>{$renderedChildren}</{$type}>";
 }

 private function renderAttributes(array $props): string
 {
  $attributes = [];
  foreach ($props as $key => $value) {
   if ($key === 'children')
    continue;
   $attributes[] = "{$key}=\"{$value}\"";
  }
  return $attributes ? ' ' . implode(' ', $attributes) : '';
 }

 private function renderChildren(array $children): string
 {
  $result = '';
  foreach ($children as $child) {
   $result .= $this->render($child);
  }
  return $result;
 }

 public function diff(array $oldTree, array $newTree): array
 {
  // This method will be implemented to handle DOM diffing
  return [];
 }
}