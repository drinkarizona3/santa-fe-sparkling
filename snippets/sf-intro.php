<div id="sf-intro" class="d-flex flex-column justify-content-center align-items-center">
  <div class="sf-logo">
    <?php get_template_part('snippets/santa-fe-logo'); ?>
  </div>

  <div class="sf-fruits">
    <?php $flavors = get_terms(array('post_type' => 'sf_flavor')); ?>

    <?php 
    
      foreach($flavors as $flavor): ?>

        <div class="sf-fruit" data-flavor="<?= $flavor->post_name ?>">
          <?php get_template_part('snippets/sf-lemon'); ?>
        </div> <?php

      endforeach;
    ?>
  </div>
</div>