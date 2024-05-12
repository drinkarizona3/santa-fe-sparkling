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

  <section id="sf-main__content" class="sf-section d-flex align-items-center">
      <div class="container-xl">
        <div class="row">
      
          <div class="col-sm">
            <div id="content" role="main">
              <?= the_content(); ?>
            </div>
          </div>
      
        </div>
      </div>
  </section>

  <section id="sf-flavors" class="sf-section">
    <?php 
    
    $flavors = SF_get_flavors();
      
    foreach ($flavors as $i => $post) : setup_postdata($post); 
    
        $link = get_field('sf_pdp_button', $post->ID);
        $link_target = $link['target'] ? $link['target'] : '_self';
        $column_direction = ($i % 2 === 0) ? ' flex-md-row-reverse' : ' flex-md-row'; ?>

      <?php SF_test($flavors) ?>

      <article class="sf-flavor sf-section d-flex align-items-center" data-sf-theme="lemon">
        <div class="container-md">
          <div class="row flex-column-reverse text-center text-md-left align-items-center<?= $column_direction ?>">

            <div class="col-md-6 sf-flavor__content">
                <div class="inner d-flex flex-column align-items-center align-items-md-start sf-gap__large">

                  <h4 class="sf-bloomsbury"><?php the_title(); ?></h4>

                  <div>
                    <?php the_content(); ?>
                  </div>

                  <?php if(!empty($link)): ?>
                    <a href="<?= $link['url'] ?>" target="<?= $link_target ?>" class="sf-button"><?= $link['title']; ?></a>
                  <?php endif; ?>

                </div>
            </div>

            <div class="col-md-6 sf-flavor__image">
              <?php $flavor_img_ID = get_post_thumbnail_id($post->ID); ?>

              <figure class="sf-flavor__image-image">
                  <?= wp_get_attachment_image( $flavor_img_ID, null, null, array(
                    'loading' => 'lazy'
                  )); ?>
              </figure>

            </div>
          </div>
        </div>
      </article> <?php

    endforeach;   wp_reset_postdata(); ?>
  </section>

  <!-- Social -->
  <?php get_template_part('snippets/sf-section-social'); ?>

</main>

<?php 
    b4st_main_after();
    get_footer(); 
?>
