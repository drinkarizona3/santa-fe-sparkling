<link rel="stylesheet" href="./css/sf-component-intro.css">

<div id="sf-intro" class="d-flex flex-column justify-content-center align-items-center">

  <div class="d-flex sf-logo">
    <?php get_template_part('snippets/santa-fe-logo'); ?>
  </div>

  <div class="sf-fruits">
      <?php 

        $flavors = SF_get_flavors();

        foreach($flavors as $flavor): ?>

          <div class="sf-fruit" data-flavor="<?= $flavor->post_name ?>">
            <?php get_template_part('snippets/sf-grapefruit'); ?>
          </div> <?php

        endforeach;
      ?>
  </div>
</div>