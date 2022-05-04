<h1 class="h2 text-dark mb-4 mt-4">ストレスログを登録</h1>
<form action="create.php" method="POST">
  <?php if (count($errors)) : ?>
    <div class="bg-warning">
      <ul class="text-danger">
        <?php foreach ($errors as $error) : ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <div class="form-group">
    <label for="stress_date">ストレスを受けた日にち</label>
    <input type="date" name="stress_date" id="stress_date" class="form-control" value="<?php echo $stress['stress_date']; ?>">
  </div>
  <div class="form-group">
    <label for="summary">状況(ストレスを受けた状況や環境等)</label>
    <textarea type="text" name="summary" id="summary" class="form-control" rows="10"><?php echo $stress['summary']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="content">トリガー(ストレスをかけた人物及び環境等)</label>
    <input type="text" name="content" id="content" class="form-control" value="<?php echo $stress['content']; ?>">
  </div>
  <div class="form-group">
    <label for="reaction">リアクション(そのストレスを感じた時の自分の態度及び思ったこと等)</label>
    <input type="text" name="reaction" id="reaction" class="form-control" value="<?php echo $stress['reaction']; ?>">
  </div>
  <div class="form-group">
    <label for="duration">持続時間(例:１日中等)</label>
    <input type="text" name="duration" id="duration" class="form-control" value="<?php echo $stress['duration']; ?>">
  </div>
  <div class="form-group">
    <label for="score">ストレスレベル（1~10の整数）</label>
    <input type="number" name="score" id="score" class="form-control" value="<?php echo $stress['score']; ?>">
  </div>
  <button type="submit">登録する</button>
