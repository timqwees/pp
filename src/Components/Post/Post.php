<?php

namespace App\Components\Post;

class Post
{
 private int $id;
 private string $title;
 private string $content;
 private int $authorId;
 private string $createdAt;
 private array $comments = [];

 public function __construct(array $data)
 {
  $this->id = $data['id'] ?? 0;
  $this->title = $data['title'] ?? '';
  $this->content = $data['content'] ?? '';
  $this->authorId = $data['author_id'] ?? 0;
  $this->createdAt = $data['created_at'] ?? date('Y-m-d H:i:s');
 }

 public function getId(): int
 {
  return $this->id;
 }

 public function getTitle(): string
 {
  return $this->title;
 }

 public function getContent(): string
 {
  return $this->content;
 }

 public function getAuthorId(): int
 {
  return $this->authorId;
 }

 public function getCreatedAt(): string
 {
  return $this->createdAt;
 }

 public function addComment(array $comment): void
 {
  $this->comments[] = $comment;
 }

 public function getComments(): array
 {
  return $this->comments;
 }

 public function toArray(): array
 {
  return [
   'id' => $this->id,
   'title' => $this->title,
   'content' => $this->content,
   'author_id' => $this->authorId,
   'created_at' => $this->createdAt,
   'comments' => $this->comments
  ];
 }
}