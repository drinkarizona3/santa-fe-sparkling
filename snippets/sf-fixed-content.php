<?php 
  $flavors = SF_get_flavors();
?>
<div id="sf-background" class="position-fixed sf-stretch" data-sf-theme="<?= $flavors[0]->post_name ?>">
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/theme/css/sf-component-fixed-content.css">

  <svg class="sf-midground position-absolute" width="1819" height="557" viewBox="0 0 1819 557" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1819 0V557H0L1819 0Z" fill="var(--sf-theme-midground)"/>
  </svg>
</div>