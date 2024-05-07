<footer id="footer" class="mt-5 bg-light">

  <div class="container">

    <!-- Check for footer widgets -->
    <?php if(is_active_sidebar('footer-widget-area')): ?>

      <div class="row pt-5 pb-4" id="footer" role="navigation">
        <?php dynamic_sidebar('footer-widget-area'); ?>
      </div>

    <?php else: ?>
    <!-- else: default footer -->
    
    <div class="row pt-3">

        <div class="col-sm">
          <p class="text-center text-sm-left">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
        </div>

        <div class="col-sm">
          <p class="text-center text-sm-right"><a href="https://github.com/SimonPadbury/b4st">b4st</a> theme for WordPress</p>
        </div>
        
    </div>

    <?php endif; ?>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
