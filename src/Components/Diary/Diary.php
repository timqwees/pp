<?php

namespace App\Components\Diary;

class Diary
{
 private array $entries = [];
 private int $userId;

 public function __construct(int $userId)
 {
  $this->userId = $userId;
 }

 public function addEntry(array $entry): void
 {
  $entry['id'] = count($this->entries) + 1;
  $entry['user_id'] = $this->userId;
  $entry['created_at'] = date('Y-m-d H:i:s');
  $this->entries[] = $entry;
 }

 public function getEntries(): array
 {
  return $this->entries;
 }

 public function getEntry(int $id): ?array
 {
  foreach ($this->entries as $entry) {
   if ($entry['id'] === $id) {
    return $entry;
   }
  }
  return null;
 }

 public function updateEntry(int $id, array $data): bool
 {
  foreach ($this->entries as &$entry) {
   if ($entry['id'] === $id) {
    $entry = array_merge($entry, $data);
    return true;
   }
  }
  return false;
 }

 public function deleteEntry(int $id): bool
 {
  foreach ($this->entries as $key => $entry) {
   if ($entry['id'] === $id) {
    unset($this->entries[$key]);
    $this->entries = array_values($this->entries);
    return true;
   }
  }
  return false;
 }

 public function getEntriesByDate(string $date): array
 {
  return array_filter($this->entries, function ($entry) use ($date) {
   return date('Y-m-d', strtotime($entry['created_at'])) === $date;
  });
 }
}