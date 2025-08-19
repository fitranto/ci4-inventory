<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">
  <div class="card-body">
    <h1 class="h4 mb-2">Dashboard</h1>
    <p class="mb-3">
      You are logged in as <strong><?= esc(session('username') ?? session('user_email')) ?></strong>.
    </p>

    <a href="/items" class="btn btn-primary">Go to Inventory</a>
  </div>
</div>

<?= $this->endSection() ?>
