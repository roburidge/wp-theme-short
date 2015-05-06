    <footer class="footer" role="contentinfo">
    
      <div id="inner-footer">

        <div class="clearfix pre-footer">
          <div class="wrap">
            <?php
            $socialTwitterurl = short_get_option( 'social_twitterurl' );
            ?>
            <a href="<?php echo $socialTwitterurl; ?>" class="icon-alone social-icons twitter">
              <span aria-hidden="true" data-icon="&#xe001;"></span>
              <span class="screen-reader-text">Twitter</span>
            </a>
            <?php
            $socialLinkedinrurl = short_get_option( 'social_linkedinurl' );
            ?>
            <a href="<?php echo $socialLinkedinrurl; ?>" class="icon-alone social-icons linkedin">
              <span aria-hidden="true" data-icon="&#xe004;"></span>
              <span class="screen-reader-text">Linked In</span>
            </a>
          </div>
        </div>

        <div class="main-footer clearfix wrap">
          <div class="fourcol first">
            <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
          </div>
          <div class="fourcol">
            <p>
              Telephone:<br>
              <span class="tel">
                <?php
                $contactPhone = short_get_option( 'contact_phone' );
                echo $contactPhone;
                ?>
              </span>
            </p>
            <p>
              <?php
              $contactEmail = short_get_option( 'contact_email' );
              ?>
              Email: <a href="<?php echo $contactEmail; ?>"><?php echo $contactEmail; ?></a>
            </p>
          </div>
          <div class="fourcol">
            <p>
              <?php
              $contactAddress = short_get_option( 'contact_address' );
              echo $contactAddress;
              ?>
            </p>
          </div>
        </div>
      
      </div> <!-- end #inner-footer -->
      
    </footer> <!-- end footer -->
  
  </div> <!-- end #container -->
  
  <!-- all js scripts are loaded in library/bones.php -->
  <?php wp_footer(); ?>

</body>

</html> <!-- end page. what a ride! -->