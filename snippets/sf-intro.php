<div id="sf-intro">

  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/theme/css/sf-component-intro.css">

  <div class="sf-inner d-flex flex-column justify-content-center align-items-center">

    <div class="d-flex sf-logo">
      <?php get_template_part('snippets/santa-fe-logo'); ?>
    </div>
  
    <div class="sf-fruits">
        <?php 
  
          $flavors = SF_get_flavors();
  
          foreach($flavors as $i => $flavor): ?>
  
            <div class="sf-fruit" data-flavor="<?= $flavor->post_name ?>" style="animation-delay: calc(120ms * <?= $i ?>);">
              <?php get_template_part('snippets/sf-grapefruit'); ?>
            </div> <?php
  
          endforeach;
        ?>
    </div>
  
    <div class="sf-message">Squeezin' the juice...</div>

  </div>

</div>

<div id="intro-tranition"></div>