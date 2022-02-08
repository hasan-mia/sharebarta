<div class="container-fluid conatiner-footer-fixed">
  <footer class="footer">
    
        <div class="footer-top">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-12">
                    <div class="footer-top-left">
                        <?php dynamic_sidebar('top-left-footer');?>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-12 col-12">
                  <div class="footer-top-right">
                    <?php dynamic_sidebar('top-right-footer');?>
                  </div>
                </div>
              </div>
        </div>

        <div class="row" id="main-footer">
            <div class="col-md-6 col-sm-12 col-12">
                <div class="footer-main-left">
                  <?php dynamic_sidebar('main-left-footer');?>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 col-12">
                <div class="footer-main-right">
                  <?php dynamic_sidebar('main-right-footer');?>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-12">
               <div class="remove">
                    <button><i class="fas fa-times-circle"></i></button>
             <?php dynamic_sidebar('facebook-page-bottom');?>
               </div>
             </div>
        </div>
        <!-- end row -->
      <?php dynamic_sidebar('footer-copyright');?>
      
  <!--============Back To Top===========-->
    <a id="button" class="backtotop"> <i class="fas fa-angle-up fa-2x"></i> </a>
  </footer>
</div>

<?php wp_footer(); ?>
</body>

</html>