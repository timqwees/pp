<?php

namespace PhpFramework\Components;

abstract class Component
{
 protected array $props = [];
 protected array $state = [];

 public function __construct(array $props = [])
 {
  $this->props = $props;
  $this->state = $this->getInitialState();
 }

 abstract public function render(): string;

 protected function getInitialState(): array
 {
  return [];
 }

 public function setState(array $newState): void
 {
  $this->state = array_merge($this->state, $newState);
  $this->update();
 }

 protected function update(): void
 {
  // This method will be implemented to handle component updates
 }

 protected function getProps(): array
 {
  return $this->props;
 }

 protected function getState(): array
 {
  return $this->state;
 }
}