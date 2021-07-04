<?php include('view/template.php') ?>
<section class="contents">
  <h2 class="page-title">Search Result for <?= $search_query ?></h2>
  <hr>
  <span class="insight">
    <em>Total number of rows: </em><strong><?= count($items) ?></strong>
  </span>
  <?php if($items){ ?>
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
              <input type="hidden" name="action" value="delete-item">
              <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
              <button class="btn delete-btn">
                <span class="material-icons-round">delete</span>
              </button>
            </form>
          </td>
          <td>
            <form action="." method="post">
              <input type="hidden" name="action" value="edit-item">
              <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
              <button class="btn edit-btn">
                <span class="material-icons-round">edit</span>
              </button>
            </form>
          </td>

        </tr>
      <?php endforeach ?>
    </table>
  <?php } else { ?>
    <h1 class="search-not-found-title red-1">No Results Found...</h1>
    <p class="search-not-found-message">Make sure that the search string has no typographical error.</p>
  <?php } ?>
  
</section>
<?php include('view/footer.php') ?>