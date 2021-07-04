<section class="sidebar">
  <ul class="nav">
    <li class="nav__header">
      <!-- <span class="material-icons-round">local_mall</span> -->
      <i class="bi bi-bag"></i>
      <span class="navitem__text">Items</span>
    </li>

    <li class="nav__navitem <?= $action == "list_items" ? 'selected' : '' ?>">
      <a href=".?action=list_items">
        <!-- <span class="material-icons-round">pageview</span> -->
        <i class="bi bi-view-list"></i>
        <span class="navitem__text">View Items</span>
      </a>
    </li>

    <li class="nav__navitem <?= $action == "add_item_page" ? 'selected' : '' ?>">
      <a href=".?action=add_item_page">
        <!-- <span class="material-icons-round">add</span> -->
        <i class="bi bi-plus"></i>
        <span class="navitem__text">Add Item</span>
      </a>
    </li>

    <!-- <li class="nav__navitem <?= $action == "add_quantity_page" ? 'selected' : '' ?>"> -->
      <!-- <a href=".?action=add_quantity_page"> -->
        <!-- <span class="material-icons-round">local_shipping</span> -->
        <!-- <i class="bi bi-truck"></i> -->
        <!-- <span class="navitem__text">New Shipping</span> -->
      <!-- </a> -->
    <!-- </li> -->

    <li class="nav__header">
      <!-- <span class="material-icons-round">category</span> -->
      <i class="bi bi-tags"></i>
      <span class="navitem__text">Categories</span>
    </li>

    <li class="nav__navitem <?= $action == "list_category" ? 'selected' : '' ?>">
      <a href=".?action=list_category">
        <!-- <span class="material-icons-round">pageview</span> -->
        <i class="bi bi-view-list"></i>
        <span class="navitem__text">View Categories</span>
      </a>
    </li>

    <li class="nav__navitem <?= $action == "add_category_page" ? 'selected' : '' ?>">
      <a href=".?action=add_category_page">
        <!-- <span class="material-icons-round">add</span> -->
        <i class="bi bi-plus"></i>
        <span class="navitem__text">Add Category</span>
      </a>
    </li>

    <li class="nav__navitem <?= $action == "category_stats_page" ? 'selected' : '' ?>">
      <a href=".?action=category_stats_page">
      <i class="bi bi-pie-chart"></i>
      <span class="navitem__text">Category Stats</span>
      </a>
    </li>
  </ul>
  <footer>
    <span>&copy; 2021 Clausia</span>
  </footer>
</section>