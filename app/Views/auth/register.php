<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
  <div class="col-md-6 col-lg-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h1 class="h4 mb-3">Create account</h1>
        <form action="/register" method="post">
          <?= csrf_field() ?>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="<?= esc(old('email')) ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Username (optional)</label>
            <input name="username" type="text" class="form-control" value="<?= esc(old('username')) ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" required minlength="8">
          </div>

          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input name="password_confirm" type="password" class="form-control" required minlength="8">
          </div>

          <button class="btn btn-primary w-100" type="submit">Register</button>
        </form>

        <p class="mt-3 mb-0">
          Already have an account? <a href="/login">Login</a>
        </p>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
