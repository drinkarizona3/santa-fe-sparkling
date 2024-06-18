<?php
    get_header(); 
    b4st_main_before();
    /* Template Name: Front Page */

    $hero_title = get_bloginfo('name');
    $hero_subtitle = get_bloginfo('description');
    $hero_fields = get_field('sf_hero');
    $hero_backgrounds = $hero_fields['backgrounds'];
?>

<main id="main" class="position-relative">

  <section class="sf-hero d-flex flex-column justify-content-center position-relative" data-sf-theme="pink-grapefruit">

    <?php 
      if($hero_backgrounds): 
    
        foreach($hero_backgrounds as $i => $background): ?>

          <div id="<?= uniqid('sf-id_'); ?>" class="sf-hero__background position-absolute <?= $background['position'] ?>" data-sf-parallax='{"speed": <?= (count($hero_backgrounds) / ($i + 1) * 2) ?>}'>
            <?= wp_get_attachment_image( $background['image']['ID'], null, null, array(
              'class' => 'sf-object-fit',
              'onload' => 'this.classList.add("sf-img-loaded")'
            )); ?>
          </div> <?php
        
        endforeach;

      endif;
    ?>

    <div class="position-relative sf-hero__content">
      <h1 class="sf-bloomsbury text-center sf-scaling-text position-absolute">
        <span class="sf-brandname position-relative" data-text="<?= strip_tags($hero_title) ?>"><?= $hero_title ?></span>
        <span class="d-block sf-subtitle position-relative" data-text="<?= strip_tags($hero_subtitle) ?>"><?= $hero_subtitle; ?></span>
      </h1>
    </div>

  </section>

  <section id="sf-main__content" class="sf-section d-flex align-items-center" data-sf-theme="pink-grapefruit">
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

  <section id="sf-flavors">

    <?php 
    
    $flavors = SF_get_flavors();
      
    foreach ($flavors as $i => $post) : setup_postdata($post); 
      
      $flavor_title = get_the_title($post->ID);
      $tagline = get_field('sf_flavor_tagline', $post->ID);
      $link = get_field('sf_pdp_button', $post->ID);
      $link_target = $link['target'] ? $link['target'] : '_self';
      $column_direction = ($i % 2 === 0) ? ' flex-md-row' : ' flex-md-row-reverse'; 
      $offset_class = ($i % 2 === 0) ? ' sf-offset-right' : ' sf-offset-left';
      ?>

      <article id="sf-flavor-section__<?= $post->post_name ?>" class="sf-section sf-flavor d-flex align-items-center" data-sf-theme="<?= $post->post_name ?>">

        <div class="container-md">

          <div class="row flex-column-reverse text-center text-md-left align-items-center<?= $column_direction ?>">
  
            <div class="col-md-8 sf-flavor__content d-flex justify-content-center">
                <div class="inner d-flex flex-column align-items-center align-items-md-start sf-gap__large">
  
                  <h4 class="sf-bloomsbury sf-title position-relative" data-text="<?= strip_tags($flavor_title) ?>"><?= $flavor_title ?></h4>
  
                  <?php if($tagline): ?>
                    <div>
                      <h5 class="sf-flavor__tagline position-relative" data-text="<?= strip_tags($tagline) ?>"><?= $tagline ?></h5>
                    </div>
                  <?php endif; ?>
  
                  <?php if(!empty($link)): ?>
                    <a href="<?= $link['url'] ?>" target="<?= $link_target ?>" class="sf-button"><?= $link['title']; ?></a>
                  <?php endif; ?>
  
                </div>
            </div>
  
            <div class="col-md-4 sf-flavor__image<?= $offset_class ?>">
              <?php $flavor_img_ID = get_post_thumbnail_id($post->ID); ?>
  
              <figure class="sf-flavor__image-image mb-5 mb-lg-0">
                  <?= wp_get_attachment_image( $flavor_img_ID, null, null, array(
                    'loading' => 'lazy'
                  )); ?>
              </figure>
  
            </div>
            
          </div>
        
        </div>
  
        
      </article> <?php

      endforeach;   wp_reset_postdata(); 
    ?>
  </section>

  <!-- Social -->
  <?php get_template_part('snippets/sf-section-social'); ?>

</main>

<?php 
    b4st_main_after();
    get_footer(); 
?>
