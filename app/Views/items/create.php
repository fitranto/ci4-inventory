<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>Add Item</h2>

<form action="/items/store" method="post">
  <?= csrf_field() ?>

  <div class="mb-3">
    <label class="form-label">Category</label>
    <input type="text" name="category" value="<?= old('category') ?>" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Stock</label>
    <input type="number" name="stock" value="<?= old('stock') ?>" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-success">Save</button>
  <a href="/items" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
