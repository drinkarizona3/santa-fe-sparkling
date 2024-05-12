<?php 
  $flavors = SF_get_flavors();
?>
<div id="sf-background" class="position-fixed sf-stretch" data-sf-theme="<?= $flavors[0]->post_name ?>">
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/theme/css/sf-component-fixed-content.css">
</div>