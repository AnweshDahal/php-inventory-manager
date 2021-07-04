<?php include("view/pre_header.php") ?>
<header>
  <div class="logo">
  <!-- <img src="view/img/CLLogo.png" class="logo__img"> -->
    <img src="view/img/Clausia Logo 2.png" class="logo__img">
    <!-- <span class="logo__title">Inventory</span> -->
  </div>
  <div class="search-form">
    <form action="." method="post">
      <input type="hidden" name="action" value="search">
      <input type="text" name="search_query" class="search-bar" placeholder="Search Item" required>
      <button class="btn search-btn">
        <span class="material-icons-round">
          search
        </span>
      </button>
    </form>
  </div>
</header>