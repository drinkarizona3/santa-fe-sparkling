<?php

  function SF_get_flavors(){
    return get_posts(array(
      'post_type' => 'sf_flavor',
      'post_status' => 'publish',
      'numberposts' => -1,
      'order' => 'ASC'
    ));
  }