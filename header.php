<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php b4st_navbar_before();?>

<nav id="navbar" class="bg-light navbar navbar-light">

  <div class="collapse navbar-collapse d-flex flex-column justify-content-center align-items-center" id="navbarDropdown">
    <?php b4st_nav(); ?>
  </div>

  <div class="d-flex align-items-center w-100 position-relative">

    <?php b4st_navbar_brand(); ?>

    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon d-flex flex-column align-items-center">
        <div class="sf-nav-text sf-bloomsbury">Explore</div>
        <?php get_template_part('snippets/sf-grapefruit'); ?>
      </span>
    </button>
  </div>

</nav>


<?php b4st_navbar_after();?>