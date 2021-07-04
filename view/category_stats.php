<?php include('view/template.php') ?>
<section class="contents">
  <h2 class="page-title">Categories</h2>
  <p class="desc">Make sure that there are no items belonging to a given category before deleting it!!</p>
  <hr>
  <span class="insight">
    <em>Total number of rows: </em><strong><?= count($categories) ?></strong>
  </span>
  <?php if($categories){?>
  <table>
    <tr>
      <th>Category ID</th>
      <th>Category Name</th>
      <th>Total Unique Items</th>
      <th>Total Items</th>
      <th>Total Stock Value</th>
    </tr>
    <?php foreach ($categories as $category): ?>
      <tr>
        <td class="number"><a href=".?action=list_items&category_id=<?= $category['category_id'] ?>"><?= $category['category_id'] ?></a></td>
        <td><?= $category['category_name'] ?></td>
        <td class="number"><?= $category['total_unique_items'] ?></td>
        <td class="number"><?= $category['total_items'] ?></td>
        <td class="number">Rs. <?= $category['total_stock_value'] ?></td>
      </tr>
    <?php endforeach ?>
  </table>
  <?php } else { ?>
    <h2 class="search-not-found-title">No Items found!!!</h2>
    <p class="search-not-found-message">Add items to view stats.</p>
  <?php } ?>
</section>
<?php include('view/footer.php') ?>