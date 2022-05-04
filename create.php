<?php

require_once __DIR__ . '/lib/mysqli3.php';

function createStress($link, $stress)
{
  $sql = <<< EOT
  INSERT INTO stresses (
  stress_date,
  summary,
  content,
  reaction,
  duration,
  score
  ) VALUES (
  "{$stress['stress_date']}",
  "{$stress['summary']}",
  "{$stress['content']}",
  "{$stress['reaction']}",
  "{$stress['duration']}",
  "{$stress['score']}"
  )
EOT;
  $result = mysqli_query($link, $sql);
  if (!$result) {
    error_log('Error: fail to create stresses');
    error_log('Debugging Error:' . mysqli_error($link));
  }
}

function validate($stress)
{
  $errors = [];

  $dates = explode('-', $stress['stress_date']);
  if (!strlen($stress['stress_date'])) {
    $errors['stress_date'] = 'ストレスを受けた日にちを入力してください。' . PHP_EOL;
  } elseif (count($dates) !== 3) {
    $errors['stress_date'] = '日にちを正しい形式で入力してください。' . PHP_EOL;
  } elseif (!checkdate($dates[1], $dates[2], $dates[0])) {
    $errors['stress_date'] = '日にちを正しい日付で入力してください。' . PHP_EOL;
  }

  if (!strlen($stress['summary'])) {
    $errors['summary'] = 'ストレス内容または状況を入力してください。' . PHP_EOL;
  } elseif (strlen($stress['summary']) > 255) {
    $errors['summary'] = 'ストレス内容または状況は255文字以内で入力してください。' . PHP_EOL;
  }

  if (!strlen($stress['content'])) {
    $errors['content'] = 'ストレスのトリガーを入力してください。' . PHP_EOL;
  } elseif (strlen($stress['content']) > 100) {
    $errors['content'] = 'ストレスのトリガーは100文字以内で入力してください。' . PHP_EOL;
  }

  if (!strlen($stress['reaction'])) {
    $errors['reaction'] = 'ストレスに対する自分の反応を入力してください。' . PHP_EOL;
  } elseif (strlen($stress['reaction']) > 100) {
    $errors['reaction'] = 'ストレスに対する自分の反応は100文字以内で入力してください。' . PHP_EOL;
  }

  if (!strlen($stress['duration'])) {
    $errors['duration'] = 'ストレスの持続時間を入力してください。' . PHP_EOL;
  } elseif (strlen($stress['duration']) > 100) {
    $errors['duration'] = 'ストレスの持続時間は100文字以内で入力してください。' . PHP_EOL;
  }

  if ($stress['score'] < 1 || $stress['score'] > 5) {
    $errors['score'] = 'ストレスの強さを1~10の整数で入力してください。' . PHP_EOL;
  }
  return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stress = [
    'stress_date' => $_POST['stress_date'],
    'summary' => $_POST['summary'],
    'content' => $_POST['content'],
    'reaction' => $_POST['reaction'],
    'duration' => $_POST['duration'],
    'score' => $_POST['score']
  ];

  $errors = validate($stress);
  if (!count($errors)) {
    $link = dbConnect();
    createStress($link, $stress);
    mysqli_close($link);
    header("Location: index.php");
  }
}

$title = 'ストレスログの登録';
$content = __DIR__ . '/./views/new.php';
include __DIR__ . '/views/layout.php';
