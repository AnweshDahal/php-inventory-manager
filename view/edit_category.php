<?php include('view/template.php') ?>
<section class="contents">
  <h2 class="page-title">Edit Category: <span class="bold"><?= $category["category_name"] ?></span></h2>
  <p class="desc">Add amount to item stock / Edit item details.</p>
  <hr>
  <form action="." method="post" class="add-form add-item-form">
    <h3 class="form-title">Edit Item Data</h2>
    <input type="hidden" name="action" value="edit_category">
    <input type="hidden" name="category_id" value="<?= $category['category_id']?>">
    <div class="input-group">
      <label>Category Name<sup class="red-1">*</sup></label>
      <input type="text" name="category_name" class="text-input" placeholder="<?= $category['category_name']?>" value="<?= $category['category_name']?>" required>
    </div>
    <div class="input-group">
    <button class="btn add-btn"><i class="bi bi-plus"></i><span class="btn-text">Update</span></button>
    </div>
  </form>

</section>
<?php include('view/footer.php') ?>