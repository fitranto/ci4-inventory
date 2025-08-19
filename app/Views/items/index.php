<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
  <h2>Inventory</h2>
  <a href="/items/create" class="btn btn-primary">+ Add Item</a>
</div>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Category</th>
      <th>Stock</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if (! empty($items)): ?>
      <?php foreach ($items as $item): ?>
        <tr>
          <td><?= esc($item['id']) ?></td>
          <td><?= esc($item['category']) ?></td>
          <td><?= esc($item['stock']) ?></td>
          <td><?= esc($item['created_at']) ?></td>
          <td><?= esc($item['updated_at']) ?></td>
          <td>
            <a href="/items/edit/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="/items/delete/<?= $item['id'] ?>" 
               class="btn btn-sm btn-danger"
               onclick="return confirm('Delete this item?')">Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    <?php else: ?>
      <tr><td colspan="6" class="text-center">No items found</td></tr>
    <?php endif ?>
  </tbody>
</table>

<?= $this->endSection() ?>
