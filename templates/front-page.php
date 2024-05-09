<?php
    get_header(); 
    b4st_main_before();
    /* Template Name: Front Page */
?>

<main id="main" class="overflow-hidden">

  <section class="sf-hero d-flex flex-column justify-content-center position-relative">

    <div class="sf-hero__background position-absolute">
      <?= wp_get_attachment_image( 10, null, null, array(
        'class' => 'sf-object-fit'
      )); ?>
    </div>

    <div class="sf-hero__background position-absolute sf-cans">
      <?= wp_get_attachment_image( 48, null, null, array(
        'class' => 'sf-object-fit'
      )); ?>
    </div>

    <div class="position-relative sf-hero__content">
      <h1 class="sf-bloomsbury text-center sf-scaling-text">
        <span class="sf-brandname"><?= bloginfo('name'); ?></span>
        <span class="d-block sf-subtitle"><?= bloginfo('description'); ?></span>
      </h1>
    </div>

  </section>

  <section id="sf-main__content" class="mh-100">
      <div class="container">
        <div class="row">
      
          <div class="col-sm">
            <div id="content" role="main">
              <?= the_content(); ?>
            </div>
          </div>
      
        </div>
      </div>
  </section>

</main>

<?php 
    b4st_main_after();
    get_footer(); 
?>
