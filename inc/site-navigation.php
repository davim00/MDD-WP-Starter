<?php
/**
 * The main site navigation
 *
 * @package William_Boles
 */

 function wp_starter_site_navigation() { ?>
   <nav id="site-navigation" class="navbar navbar-default main-navigation" role="navigation">
     <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <h1 class="site-title"><?php wp_starter_the_custom_logo(); ?><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
       </div>

       <!-- Collect the nav links, forms, and other content for toggling -->
       <?php
         wp_nav_menu( array(
           'menu'              => 'primary-menu',
           'theme_location'    => 'primary',
           'depth'             => 2,
           'container'         => 'div',
           'container_class'   => 'collapse navbar-collapse',
           'container_id'      => 'navbar',
           'menu_class'        => 'nav navbar-nav',
           'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
           'walker'            => new WP_Bootstrap_Navwalker())
             );
       ?><!-- /.navbar-collapse -->
     </div><!-- /.container-fluid -->
   </nav><!-- #site-navigation -->
 <?php }
