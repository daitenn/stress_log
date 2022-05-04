<?php

require_once __DIR__ . '/lib/mysqli3.php';


function dropTable($link)
{
  $dropTableSql = 'DROP TABLE IF EXISTS stresses;';
  $result = mysqli_query($link, $dropTableSql);
  if ($result) {
    echo 'テーブルを削除できました。' . PHP_EOL;
  } else {
    echo 'Error: テーブルを削除できませんでした。' . PHP_EOL;
    echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
  }
}

function createTable($link)
{
  $createTableSql = <<<EOT
  CREATE TABLE stresses (
  id INTEGER AUTO_INCREMENT NOT NULL  PRIMARY KEY,
  stress_date DATE,
  summary VARCHAR(255),
  content VARCHAR(100),
  reaction VARCHAR(100),
  duration VARCHAR(100),
  score INTEGER,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;

  $result = mysqli_query($link, $createTableSql);
  if ($result) {
    echo 'テーブルを作成いたしました。' . PHP_EOL;
  } else {
    echo 'テーブルの作成に失敗いたしました。' . PHP_EOL;
    echo 'Debugging error:' . mysqli_error($link) . PHP_EOL;
  }
}

$link = dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
