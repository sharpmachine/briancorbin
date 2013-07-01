<?php

/**
* Setup the WordPress core custom header feature.
*
* Use add_theme_support to register support for WordPress 3.4+
* as well as provide backward compatibility for previous versions.
* Use feature detection of wp_get_theme() which was introduced
* in WordPress 3.4.
*
* @uses keiran_admin_header_style()
* @uses keiran_admin_header_image()
*
*/

function keiran_custom_header_setup() {
	$args = array(
	'default-image' => '',
	'width' => 880,
	'height' => 330,
	'header-text'   => false,	
	'flex-height' => true,
	'flex-width' => true,
	'admin-head-callback' => 'keiran_admin_header_style',
	'admin-preview-callback' => 'keiran_admin_header_image',
);

	$args = apply_filters( 'keiran_custom_header_args', $args );
	add_theme_support( 'custom-header', $args );
}

add_action( 'after_setup_theme', 'keiran_custom_header_setup' );

/**
* Shiv for get_custom_header().
*
* get_custom_header() was introduced to WordPress
* in version 3.4. To provide backward compatibility
* with previous versions, we will define our own version
* of this function.
*
* @return stdClass All properties represent attributes of the curent header image.
*
*/

if ( ! function_exists( 'get_custom_header' ) ) {
	function get_custom_header() {
		return (object) array(
			'url' => get_header_image(),
			'thumbnail_url' => get_header_image(),
			'width' => HEADER_IMAGE_WIDTH,
			'height' => HEADER_IMAGE_HEIGHT,
		);
	}
}


if ( ! function_exists( 'keiran_admin_header_style' ) ) :

/**
* Styles the header image displayed on the Appearance > Header admin panel.
* @see keiran_custom_header_setup().
*/

function keiran_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
	}
	#headimg h1 {font-size:4em;
	}
	#headimg h1 a { text-decoration:none;
	}
	#desc {
	}
	#headimg img {
	}
	</style>

<?php
}
endif; // keiran_admin_header_style

if ( ! function_exists( 'keiran_admin_header_image' ) ) :
	$options = get_option('keiran_theme_options');
	

function keiran_admin_header_image() { ?>
		<div id="headimg">
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" /><?php
        else: 
		$options = keiran_get_theme_options();
		if (isset($options)):
			$style = ' style="color:' . esc_html( $options['custom_color'] ) . ';"';
		else:
			$default_options = keiran_get_default_theme_options();			
			$style = ' style="color:' . esc_html( $default_options['custom_color'] ) . ';"';
		endif;
		$style2 = ' style="color:#333333;"';
		if ($options['custom_logo']==''):
			
?>
	<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<div id="desc"<?php echo $style2; ?>><?php bloginfo( 'description' ); ?></div>
    <?php else:?>
   <img src="<?php echo $options['custom_logo']; ?>" />
      <?php endif; //custom-logo ?> 
		<?php endif; ?>
       
	</div>

 <?php }

endif; // keiran_admin_header_image