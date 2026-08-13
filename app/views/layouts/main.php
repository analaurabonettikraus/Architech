<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8"/><meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <title>Architech</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;600;700&family=Urbanist:wght@400;600;700;800&display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?= ASSETS ?>/css/style.css"/>
</head>
<body>
  <?php include ROOT . '/app/views/layouts/_sidebar.php'; ?>
  <div class="main-wrap">
    <?php include ROOT . '/app/views/layouts/_topnav.php'; ?>
    <script src="<?= ASSETS ?>/js/learning-progress.js"></script>
    <?= $content ?>
  </div>
  <script src="<?= ASSETS ?>/js/app.js"></script>
</body>
</html>
