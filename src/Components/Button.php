<?php

namespace PhpFramework\Components;

class Button extends Component
{
 public function render(): string
 {
  $props = $this->getProps();
  $text = $props['text'] ?? 'Click me';
  $onClick = $props['onClick'] ?? '';

  return "<button onclick=\"{$onClick}\">{$text}</button>";
 }
}