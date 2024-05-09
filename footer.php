<footer id="footer" class="position-relative">

  <!-- Check for footer widgets -->
  <?php if(is_active_sidebar('footer-widget-area')): ?>
    
    <div class="container">
      <div class="row pt-5 pb-4" id="footer" role="navigation">
        <?php dynamic_sidebar('footer-widget-area'); ?>
      </div>
    </div>

  <?php else: ?>
  <!-- else: default footer -->
    
    <div class="row pt-3 px-5 no-gutters">

      <div class="col-sm">
        <p class="text-center text-sm-left">&copy; <?php echo date('Y'); ?> <span>Mango Group Holdings llc</span></p>
      </div>

      <div class="col-sm">
        <p class="text-center text-sm-right">
          <span class="dev-copyright">Design and Development By</span> <a class="mpire-link" href="https://mpirecreative.com" target="_blank"><span class="mpire-m">M</span>pire Creative</span></a>
        </p>
      </div>

    </div>    

  <?php endif; ?>

</footer>

<?php wp_footer(); ?>
</body>
</html>