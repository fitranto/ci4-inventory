<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= esc($title ?? 'Inventory App') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Quick drop-in styling (Bootstrap via CDN) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <nav class="navbar navbar-light bg-white border-bottom mb-4">
    <div class="container">
      <a class="navbar-brand" href="/">CI4 Inventory</a>
      <?php if (session('isLoggedIn')): ?>
        <div>
          <span class="me-3">Hi, <?= esc(session('username') ?? session('user_email')) ?></span>
          <a class="btn btn-outline-danger btn-sm" href="/logout">Logout</a>
        </div>
      <?php endif; ?>
    </div>
  </nav>

  <main class="container">
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger">
        <ul class="mb-0">
        <?php foreach (session()->getFlashdata('errors') as $e): ?>
          <li><?= esc($e) ?></li>
        <?php endforeach ?>
        </ul>
      </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
  </main>
</body>
</html>
