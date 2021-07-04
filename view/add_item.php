<?php include('view/template.php') ?>
<section class="contents">
<h2 class="page-title">Add New Item</h2>
<p class="desc">Add new item to the database, the fields marked with <span class="red-1">*</span> are required. Make sure that the category you want the item to be in exists.</p>
<hr>
<form action="." method="post" class="add-form add-item-form">
  <input type="hidden" name="action" value="add_item">
  <div class="input-group">
    <label>Category<sup class="red-1">*</sup></label>
    <select name="category_id" class="select-null-bordered" required>
      <option value="0" disabled selected>Select a Category</option>
      <?php foreach ($categories as $category):?>
        <?php if($category_id == $category['category_id']) {?>
          <option value="<?= $category['category_id'] ?>" selected >
        <?php } else { ?>
          <option value="<?= $category['category_id'] ?>">
        <?php } ?>
          <?= $category['category_name'] ?>
        </option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="input-group">
    <label>Item Name<sup class="red-1">*</sup></label>
    <input type="text" name="item_name" class="text-input" required>
  </div>
  <div class="input-group">
    <label>Price<sup class="red-1">*</sup></label>
    <input type="number" name="price" class="text-input" required>
  </div>
  <div class="input-group">
    <label>Quantity<sup class="red-1">*</sup></label>
    <input type="number" name="quantity" class="text-input" required>
  </div>
  <div class="input-group">
    <label>Manufacturer</label>
    <input type="text" name="manufacturer" class="text-input" required>
  </div>
  <div class="input-group">
    <button class="btn add-btn"><i class="bi bi-save"></i><span class="btn-text">Save</span></button>
  </div>
</form>
</section>
<?php include('view/footer.php') ?>