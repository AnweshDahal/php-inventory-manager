<?php include('view/template.php') ?>
<section class="contents">
<h2 class="page-title">Add New Category</h2>
<p class="desc">Add new category to the database, the fields marked with <span class="red-1">*</span> are required. Make sure that the category id is different.</p>
<hr>
<form action="." method="post" class="add-form add-category-form">
  <input type="hidden" name="action" value="add_category">
  <div class="input-group">
    <label>Category ID<sup class="red-1">*</sup></label>
    <input type="text" name="category_id" class="text-input" required>
  </div>
  <div class="input-group">
    <label>Category Name<sup class="red-1">*</sup></label>
    <input type="text" name="category_name" class="text-input" required>
  </div>
  <div class="input-group">
    <button class="btn add-btn"><i class="bi bi-save"></i><span class="btn-text">Save</span></button>
  </div>
</form>
</section>
<?php include('view/footer.php') ?>