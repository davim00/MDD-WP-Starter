<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package William_Boles
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wp_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'wp_starter_body_classes' );



/**
 * Modify the Read More link
 *
 * @link https://codex.wordpress.org/Customizing_the_Read_More
 */
 function modify_read_more_link() {
    return '<div class="read-more-link"><a class="more-link" href="' . get_permalink() . '">Read more</a></div>';
	}
add_filter( 'the_content_more_link', 'modify_read_more_link' );



/**
 * Modify the post password form output
 */
add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$output = '<form class="post-password-form" action="' . esc_url( site_url('/wp-login.php?action=postpass', 'login_post') ) . '" method="post"><p>' . __( 'This content is password protected. To view it please enter your password below:' ) . '</p><div class="form-group form-inline"><label for="' . $label . '" class="sr-only">Password</label><input name="post-password" id="' . $label . '" type="password" placeholder="Password" class="form-control"/><input type="submit" name="Submit" class="password-submit btn btn-default" value="' . esc_attr__( "Submit" ) . '" /></div></form>';
	return $output;
};







/**
 * Display the featured image and set a fallback image
 * if there is not featured image.
 */
 function wp_starter_post_thumbnail() {
	 if ( has_post_thumbnail() ) {
		 the_post_thumbnail();
	 } else {
		 ?>	<img src="<?php echo esc_url( bloginfo('template_directory') . '/images/featured-img-fallback.jpg' ); ?>" alt="<?php the_title(); ?>" />
		<?php ;
 	 }
 }



 /**
  * Display the site logo.
  */
 function wp_starter_the_custom_logo() {
	 if ( function_exists( 'the_custom_logo' ) ) {
 		the_custom_logo();
 	}
 }
// Make the custom logo play nicely with Bootstrap
 add_filter('get_custom_logo','change_logo_class');
 function change_logo_class($html) {
	 $html = str_replace('custom-logo-link', 'navbar-brand', $html);
	 return $html;
 }
 add_filter( 'get_custom_logo', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
