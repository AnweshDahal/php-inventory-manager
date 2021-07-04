<?php include('view/template.php') ?>
<section class="contents">
  <h2 class="page-title">Categories</h2>
  <p class="desc">Make sure that there are no items belonging to a given category before deleting it!!</p>
  <hr>
  <span class="insight">
    <em>Total number of rows: </em><strong><?= count($categories) ?></strong>
  </span>
  <table>
    <tr>
      <th>Category ID</th>
      <th>Category Name</th>
      <th></th>
      <th></th>
    </tr>
    <?php foreach ($categories as $category): ?>
      <tr>
        <td class="number"><a href=".?action=list_items&category_id=<?= $category['category_id'] ?>"><?= $category['category_id'] ?></a></td>
        <td><?= $category['category_name'] ?></td>
        <td>
          <form action="." method="post">
            <input type="hidden" name="action" value="delete_category">
            <input type="hidden" name="category_id" value="<?= $category['category_id'] ?>">
            <button class="btn delete-btn">
              <span class="material-icons-round">delete</span>
            </button>
          </form>
        </td>
        <td>
          <form action="." method="post">
            <input type="hidden" name="action" value="edit_category_page">
            <input type="hidden" name="category_id" value="<?= $category['category_id'] ?>">
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