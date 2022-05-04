<?php

$errors = [];

$stress = [
  'stress_date' => '',
  'summary' => '',
  'content' => '',
  'reaction' => '',
  'duration' => '',
  'score' => ''
];

$title = 'ストレスログの登録';
$content = __DIR__ . "/views/new.php";
include __DIR__ . '/views/layout.php';
