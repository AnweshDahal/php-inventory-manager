<?php include('view/template.php') ?>
<section class="contents">
  <h2 class="page-title">Items</h2>
  <hr>
  <span class="insight">
    <em>Total number of rows: </em><strong><?= count($items) ?></strong>
  </span>
  <form action="." method="post" class="select-category-form">
    <input type="hidden" name="action" value="list_items">
    <select name="category_id" class="select-full-bordered" required>
      <option value="0">View All</option>
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
    <button class="btn filter-btn">Filter</button>
  </form>
  <table>
    <tr>
      <th>Item Name</th>
      <th>Manufacturer</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total Stock Value</th>
      <th>Category</th>
      <th></th>
      <th></th>
    </tr>
    <?php foreach ($items as $item): ?>
      <tr>
        <td><?= $item['item_name'] ?></td>
        <td class="number"><?= $item['manufacturer'] ?></td>
        <td class="number">Rs. <?= $item['price'] ?></td>
        <td class="number"><?= $item['quantity'] ?></td>
        <td class="number">Rs. <?= $item['total_stock_value'] ?></td>
        <td><?= $item['category_name']?></td>
        <td>
          <form action="." method="post">
            <input type="hidden" name="action" value="delete_item">
            <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
            <button class="btn delete-btn">
              <span class="material-icons-round">delete</span>
            </button>
          </form>
        </td>
        <td>
          <form action="." method="post">
            <input type="hidden" name="action" value="edit_item_page">
            <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
            <button class="btn edit-btn">
              <span class="material-icons-round">edit</span>
            </button>
          </form>
        </td>

      </tr>
    <?php endforeach ?>
  </table>
</section>
<?php include('view/footer.php') ?>