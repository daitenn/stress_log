<?php

require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysqli3.php';

function listStresses($link)
{
  $sql = 'SELECT id, stress_date, summary, content, reaction, duration, score FROM stresses;';
  $results = mysqli_query($link, $sql);
  if (!$results) {
    echo 'データの取得ができませんでした。' . PHP_EOL;
    echo 'Debugging Error:' . mysqli_error($link);
    exit;
  }

  while ($stress = mysqli_fetch_assoc($results)) {
    $stresses[] = $stress;
  }
  mysqli_free_result($results);
  return $stresses;
}

$link = dbConnect();
$stresses = listStresses($link);

$title = 'ストレスログの一覧';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';
