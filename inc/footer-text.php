<?php
/**
 * Copyright info. and text for the bottom of the footer
 *
 * @package William_Boles
 */

 function wp_starter_footer_text() { ?>
   <div class="row">

     <?php if ( true == get_theme_mod( 'footer_copyright_year', true ) ) : ?>
       <div class="site-copyright col-sm-6">
         &copy; <?php echo date("Y") . ' ' . get_theme_mod( 'footer_copyright_text', 'MDD WordPress Starter. All rights reserved.' ); ?>
       </div>

       <div class="site-info col-sm-6">

       <?php else : ?>

       <div class="site-info col-sm-12">

       <?php endif;

       echo get_theme_mod( 'footer_text', 'Theme: wp-starter by <a href="http://mattdavisdesign.com/" target="_blank">Matt Davis</a>' ); ?>

     </div><!-- .site-info -->
   </div><!-- .row -->
 <?php }
