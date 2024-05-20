<?php 
  $flavors = SF_get_flavors();
?>
<div id="sf-background" class="position-fixed sf-stretch" data-sf-theme="<?= $flavors[0]->post_name ?>">
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/theme/css/sf-component-fixed-content.css">

  <div class="sf-foreground">

    <svg preserveAspectRatio="none" class="sf-horizon position-absolute" width="1819" height="557" viewBox="0 0 1819 557" fill="none">
      <path d="M1819 0V557H0L1819 0Z" fill="var(--sf-theme-midground)"/>
    </svg>

    <div class="sf-dots__rectangle position-absolute">
      <?php get_template_part('snippets/sf-dots-reactangle'); ?>
    </div>

    <div class="sf-dots__rectangle position-absolute">
      <?php get_template_part('snippets/sf-dots-square'); ?>
    </div>
    
    <?php for ($i = 1; $i <= 2; $i++): ?>
      <div class="sf-cloud position-absolute">
        <?php get_template_part('snippets/sf-cloud'); ?>
      </div>
    <?php endfor; ?>
    
  </div>
</div>