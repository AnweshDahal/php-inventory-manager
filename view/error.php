<?php include('view/pre_header.php') ?>
  <section class="error">
    <div class="display">
      <!-- <span class="material-icons-round">sentiment_very_dissatisfied</span> -->
      <i class="bi bi-emoji-frown"></i>
    </div>
    <h1 class="error__title">AN ERROR OCCURED!!</h1>
    <p class="error__description"><?= $error ?></p>
    <a href=".">Return to Homepage</a>
  </section>
<?php include('view/post_footer.php') ?>