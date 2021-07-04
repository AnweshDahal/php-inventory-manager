<?php include('view/template.php') ?>
<section class="contents">
  <h2 class="page-title">Edit Item: <span class="bold"><?= $item[0]["item_name"] ?></span></h2>
  <p class="desc">Add amount to item stock / Edit item details.</p>
  <hr>
  <form action="." method="post" class="add-form add-quantity-form">
    <h3 class="form-title">Add Amount to Stock</h3>
    <input type="hidden" name="action" value="add_quantity">
    <input type="hidden" name="item_id" value="<?= $item[0]['item_id'] ?>">
    <div class="input-group">
      <label>Item</label>
      <h4 class="label-value"><?= $item[0]['item_name'] ?></h4>
    </div>
    <div class="input-group">
      <label>Current Stock Quantity</label>
      <h4 class="label-value"><?= $item[0]['quantity'] ?></h4>
    </div>
    <div class="input-group">
      <label>Additional Amount<sup class="red-1">*</sup></label>
      <input type="number" name="additional_quantity" class="text-input">
    </div>
    <div class="input-group">
      <button class="btn add-btn"><i class="bi bi-plus"></i><span class="btn-text">Update</span></button>
    </div>
  </form>
  <br>
  <form action="." method="post" class="add-form add-item-form">
    <h3 class="form-title">Edit Item Data</h2>
    <input type="hidden" name="action" value="edit_item">
    <input type="hidden" name="item_id" value="<?= $item[0]['item_id'] ?>">
    <div class="input-group">
      <label>Category<sup class="red-1">*</sup></label>
      <select name="category_id" class="select-null-bordered" required>
        <option value="0" disabled selected>Select a Category</option>
        <?php foreach ($categories as $category):?>
          <?php if($item[0]['category'] == $category['category_id']) {?>
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
      <input type="text" name="item_name" class="text-input" placeholder="<?= $item[0]['item_name']?>" value="<?= $item[0]['item_name']?>" required>
    </div>
    <div class="input-group">
      <label>Price<sup class="red-1">*</sup></label>
      <input type="number" name="price" class="text-input" placeholder="<?= $item[0]['price']?>" value="<?= $item[0]['price']?>" required>
    </div>
    <div class="input-group">
      <label>Quantity<sup class="red-1">*</sup></label>
      <input type="number" name="quantity" class="text-input" placeholder="<?= $item[0]['quantity']?>" value="<?= $item[0]['quantity']?>" required>
    </div>
    <div class="input-group">
      <label>Manufacturer</label>
      <input type="text" name="manufacturer" class="text-input" placeholder="<?= $item[0]['manufacturer']?>" value="<?= $item[0]['manufacturer']?>" required>
    </div>
    <div class="input-group">
    <button class="btn add-btn"><i class="bi bi-plus"></i><span class="btn-text">Update</span></button>
    </div>
  </form>

</section>
<?php include('view/footer.php') ?>