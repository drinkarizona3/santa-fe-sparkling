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

  <section id="sf-main__content" class="sf-section sf-section__short d-flex align-items-center">
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
        $flavors = get_posts(array(
          'post_type' => 'sf_flavor'
        ));

        // $flavors = new WP_Query(array(
        //   'post_type' => 'sf_flavor'
        // ));
        
        var_dump($flavors);
      
      foreach ($flavors as $post) : setup_postdata($post); ?>

        <article class="sf-flavor sf-section">
          <div class="container-xl">
            <div class="row">

              <div class="col-6 sf-flavor__content">
                  <h4><?php the_title(); ?></h4>

                  <?php the_content(); ?>
              </div>

              <div class="col-6 sf-flavor__image">
                <?php $flavor_img_ID = get_post_thumbnail_id($post->ID); ?>

                <figure class="sf-flavor__image-image">
                    <?= wp_get_attachment_image( $flavor_img_ID, null, null, array()); ?>
                </figure>

              </div>
            </div>
          </div>
        </article> <?php

        wp_reset_postdata();

      endforeach; ?>
  </section>

</main>

<?php 
    b4st_main_after();
    get_footer(); 
?>
