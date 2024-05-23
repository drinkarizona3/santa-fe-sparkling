<?php 
  $flavors = SF_get_flavors();
?>

etstsets
<div id="sf-background" class="position-fixed sf-stretch overflow-hidden" data-sf-theme="<?= SF_get_first_flavor()->ID ?>">
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/theme/css/sf-component-fixed-content.css">

  <div class="sf-foreground">

    <svg preserveAspectRatio="none" class="sf-horizon position-absolute" width="1819" height="557" viewBox="0 0 1819 557" fill="none">
      <path d="M1819 0V557H0L1819 0Z" fill="var(--sf-theme-midground)"/>
    </svg>

    <div class="sf-dots sf-dots__rectangle position-absolute">
      <?php get_template_part('snippets/sf-dots-rectangle'); ?>
    </div>

    <div class="sf-pueblo-house position-absolute">
      <?php get_template_part('snippets/sf-pueblo-house'); ?>
    </div>

    <div class="sf-dots sf-dots__square position-absolute">
      <?php get_template_part('snippets/sf-dots-square'); ?>
    </div>
    
    <?php for ($i = 1; $i <= 2; $i++): 

      $cloud_class = '';

      switch ($i) {
        case 1:
          $cloud_class = ' sf-cloud-back';
          break;
        case 2:
          $cloud_class = ' sf-cloud-front';
        break;
      } 
    ?>
      <div class="position-absolute sf-cloud<?= $cloud_class; ?>" data-sf-parallax="<?= $i * 200 ?>">
        <?php get_template_part('snippets/sf-cloud'); ?>
      </div>
    <?php endfor; ?>
    
  </div>
</div>