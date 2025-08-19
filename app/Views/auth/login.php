<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
  <div class="col-md-6 col-lg-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h1 class="h4 mb-3">Login</h1>
        <form action="/login" method="post">
          <?= csrf_field() ?>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="<?= esc(old('email')) ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" required>
          </div>

          <button class="btn btn-primary w-100" type="submit">Login</button>
        </form>

        <p class="mt-3 mb-0">
          Don’t have an account? <a href="/register">Register</a>
        </p>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
