<?php
    get_header(); 
    b4st_main_before();
    /* Template Name: Front Page */
?>

<main id="main">

  <section class="sf-hero">

    <div class="sf-hero__background">
      <?= wp_get_attachment_image( 10, 'large', null, array(
        'class' => 'sf-object-fit'
      )); ?>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
        </div>
      </div>
    </div>

  </section>
  <div class="row">

    <div class="col-sm">
      <div id="content" role="main">
        
      </div><!-- /#content -->
    </div>

  </div><!-- /.row -->
</main><!-- /.container -->

<?php 
    b4st_main_after();
    get_footer(); 
?>
