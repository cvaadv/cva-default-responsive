<?php
$wp_less_styles = null;
function wp_print_less_styles( $handles = false ) {
	do_action( 'wp_print_less_styles' );
	if ( '' === $handles ) // for wp_head
		$handles = false;

	global $wp_less_styles;
	if ( !is_a($wp_less_styles, 'WP_LESS_Styles') ) {
		if ( !$handles )
			return array(); // No need to instantiate if nothing's there.
		else
			$wp_less_styles = new WP_LESS_Styles();
	}

	return $wp_less_styles->do_items( $handles );
}

function wp_register_less_style( $handle, $src, $deps = array(), $ver = false, $media = 'all' ) {
	global $wp_less_styles;
	if ( !is_a($wp_less_styles, 'WP_LESS_Styles') )
	  $wp_less_styles = new WP_LESS_Styles();

	$wp_less_styles->add( $handle, $src, $deps, $ver, $media );
}

function wp_deregister_less_style( $handle ) {
	global $wp_less_styles;
	if ( !is_a($wp_less_styles, 'WP_LESS_Styles') )
		$wp_less_styles = new WP_LESS_Styles();

	$wp_less_styles->remove( $handle );
}

function wp_enqueue_less_style( $handle, $src = false, $deps = array(), $ver = false, $media = 'all' ) {
	global $wp_less_styles;
	if ( !is_a($wp_less_styles, 'WP_LESS_Styles') )
	  $wp_less_styles = new WP_LESS_Styles();

	if ( $src ) {
		$_handle = explode('?', $handle);
		$wp_less_styles->add( $_handle[0], $src, $deps, $ver, $media );
	}
	$wp_less_styles->enqueue( $handle );
}

function wp_less_style_is( $handle, $list = 'queue' ) {
	global $wp_less_styles;
	if ( !is_a($wp_less_styles, 'WP_LESS_Styles') )
		$wp_less_styles = new WP_LESS_Styles();

	$query = $wp_less_styles->query( $handle, $list );

	if ( is_object( $query ) )
		return true;

	return $query;
}

add_action('wp_head', 'wp_print_less_styles');
