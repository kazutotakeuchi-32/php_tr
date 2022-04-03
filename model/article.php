<?php
class Article
{
  function __construct(string $title, string $content)
  {
    $this->title = $title;
    $this->content = $content;
  }

  function getTitle(): string
  {
    return $this->title;
  }

  function getContent(): string
  {
    return $this->content;
  }

  function setTitle(string $title): void
  {
    $this->title = $title;
  }

  
}
