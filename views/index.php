<h1>ストレスログの一覧</h1>
<a href="new.php" class="btn btn-primary mb-4">ストレスログを追加する</a>
<main>
  <?php if (count($stresses)) : ?>
    <?php foreach ($stresses as $stress) : ?>
      <section class="card shadow-sm mb-4">
        <div class="card text-center">
          <h2 class="card-header"><?php echo escape($stress['stress_date']); ?></h2>
          <div class="card-body">
            <br class="card-title"><?php echo escape($stress['summary']); ?></br>
            <br class="card-title"><?php echo escape($stress['content']); ?></br>
            <br class="card-title"><?php echo escape($stress['reaction']); ?></br>
            <br class="card-title"><?php echo escape($stress['duration']); ?></br>
            <br class="card-title"><?php echo escape($stress['score']); ?></br>
          </div>
        </div>
      </section>
    <?php endforeach; ?>
  <?php else : ?>
    <p class="text-danger">ストレスログ情報がありません</p>
  <?php endif; ?>
</main>
