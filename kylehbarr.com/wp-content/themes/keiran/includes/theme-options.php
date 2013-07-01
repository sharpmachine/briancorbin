<?php
/**
 * keiran Change Color
 */

/**
 * Properly enqueue styles and scripts for our theme options page.
 *
 * This function is attached to the admin_enqueue_scripts action hook.
 *
 * @param string $hook_suffix The action passes the current page to the function. We don't
 * 	do anything if we're not on our theme options page.
 */
 
function keiran_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'keiran-theme-options', get_template_directory_uri() . '/includes/theme-options.css', false, '2012-05-02' );
	wp_enqueue_script( 'keiran-theme-options', get_template_directory_uri() . '/includes/theme-options.js', array( 'farbtastic' ), '2012-05-02' );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_print_scripts-appearance_page_theme_options', 'keiran_admin_enqueue_scripts' );

/**
 * Register the form setting for our keiran_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, keiran_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are complete, properly
 * formatted, and safe.
 *
 * We also use this function to add our theme option if it doesn't already exist.
 */
function keiran_theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === keiran_get_theme_options() )
		add_option( 'keiran_theme_options', keiran_get_default_theme_options() );

	register_setting(
		'keiran_options',       // Options group, see settings_fields() call in keiran_theme_options_render_page()
		'keiran_theme_options', // Database option, see keiran_get_theme_options()
		'keiran_theme_options_validate', // The sanitization callback, see keiran_theme_options_validate()
		'keiran_custom_logo_validate' //The sanitization callback 2
	);
}
add_action( 'admin_init', 'keiran_theme_options_init' );

/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 */
function keiran_theme_options_add_page() {
	add_theme_page(
		__( 'Keiran Options', 'keiran' ), // Name of page
		__( 'Keiran Options', 'keiran' ), // Label in menu
		'edit_theme_options',                  // Capability required
		'theme_options',                       // Menu slug, used to uniquely identify the page
		'keiran_theme_options_render_page'      // Function that renders the options page
	);
}
add_action( 'admin_menu', 'keiran_theme_options_add_page' );

/**
 * Returns the default options for keiran.
 */ 
function keiran_get_default_theme_options() {
	$default_theme_options = array(
		'custom_color'   => '#CC0000',
		'custom_logo' => '',
		'custom_favicon' => '',				
	);

	return apply_filters( 'keiran_default_theme_options', $default_theme_options );
}

/**
 * Returns the options array for keiran.
 */
function keiran_get_theme_options() {
	return get_option( 'keiran_theme_options' );
}

/**
 * Returns the options array for keiran.
 */
function keiran_theme_options_render_page() {
	?>
		<h1><?php printf( __( '%s Options', 'keiran' ), wp_get_theme() ); ?></h1>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'keiran_options' );
				$options = keiran_get_theme_options();
				$default_options = keiran_get_default_theme_options();
			?>

<h2><?php _e( 'Custom Color', 'keiran' ); ?></h2>
					<p><input id="link-color" type="text" name="keiran_theme_options[custom_color]"  value="<?php echo esc_attr( $options['custom_color'] ); ?>" />
							<a href="#" class="pickcolor hide-if-no-js" id="link-color-example"></a>
							<input type="button" class="pickcolor button hide-if-no-js" value="<?php esc_attr_e( 'Select a Color', 'keiran' ); ?>">
							<div id="colorPickerDiv" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
							<br />
							<label class="description"><?php printf( __( 'Changes the color of the mouse over effects.', 'keiran' ), $default_options['custom_color'] ); ?></label></p>
</p><h2><?php _e( 'Custom Logo', 'keiran' ); ?></h2><p>						

							<input class="regular-text" type="text" name="keiran_theme_options[custom_logo]" value="<?php echo( $options['custom_logo'] ); ?>" /><br />
						<label class="description" for="keiran_theme_options[custom_logo]"><a href="<?php echo home_url(); ?>/wp-admin/media-new.php" target="_blank"><?php _e('Upload your own logo image', 'keiran'); ?></a> <?php _e(' using the WordPress Media Library and then insert the URL here', 'keiran'); ?></label></p>
					<h2><?php _e( 'Custom Favicon', 'keiran' ); ?></h2><p>
						<input class="regular-text" type="text" name="keiran_theme_options[custom_favicon]" value="<?php echo( $options['custom_favicon'] ); ?>" />
						<label class="description" for="keiran_theme_options[custom_favicon]"><?php _e( 'Upload your .ico Favicon image (via FTP) to your server and enter the Favicon URL here.', 'keiran' ); ?></label>
						                  </p>


			<?php submit_button(); ?>
		</form>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 */
 
function keiran_theme_options_validate( $input ) {
	$output = $defaults = keiran_get_default_theme_options();

	// Our defaults for the link color may have changed, based on the color scheme.
	$output['custom_color'] = $defaults['custom_color'];

	// Link color must be 3 or 6 hexadecimal characters
	if ( isset( $input['custom_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['custom_color'] ) )
		$output['custom_color'] = '#' . strtolower( ltrim( $input['custom_color'], '#' ) );

	// Text options must be safe text with no HTML tags
	
	if ( isset( $input['custom_logo'] ) ) {
    	$custom_logo = esc_url_raw( $input['custom_logo'] );
        if ( ! empty( $custom_logo ) )
         	$output['custom_logo'] = wp_filter_nohtml_kses( $custom_logo );
	 }

	 if ( isset( $input['custom_favicon'] ) ) {
         $custom_favicon = esc_url_raw( $input['custom_favicon'] );
         if ( ! empty( $custom_favicon ) )
    	     $output['custom_favicon'] = wp_filter_nohtml_kses( $custom_favicon );
	 }
	
	return apply_filters( 'keiran_theme_options_validate', $output, $input, $defaults ); 

}

/**
 * Add a style block to the theme for the current link color.
 *
 * This function is attached to the wp_head action hook.
 */
function keiran_insert_custom_color() {
	$options = keiran_get_theme_options();
	$custom_color = esc_html( $options['custom_color'] );
	$default_options = keiran_get_default_theme_options();

?>
	<style>
		a:hover, a:active, .widget li a:hover, .widget li a:active,  .tagcloud a:hover {color: <?php echo $custom_color; ?>!important;}
		#search_submit:hover, input#submit:hover {background-color: <?php echo $custom_color; ?>!important;}
		.reply a:hover, .reply a:focus, .reply a:active {background-color: <?php echo $custom_color; ?>!important;}
#comments .nav-previous a:hover, #comments .nav-next a:hover, #comments .nav-next a:focus, #comments .nav-previous a:focus, #comments .nav-previous a:active, #comments .nav-next a:active {background-color: <?php echo $custom_color; ?>!important;}			
		#image-navigation .previous-image a:hover, #image-navigation .next-image a:hover, #image-navigation .previous-image a:focus, #image-navigation .next-image a:focus, #image-navigation .previous-image a:active, #image-navigation .next-image a:active,  #content #nav-below .nav-previous a:hover, #content #nav-below .nav-next a:hover, #content #nav-below .nav-previous a:focus, #content #nav-below .nav-next a:focus, #content #nav-below .nav-previous a:active, #content #nav-below .nav-next a:active, #nav-posts .nav-previous a:hover, #nav-posts .nav-next a:hover, #nav-posts .nav-previous a:focus, #nav-posts .nav-next a:focus, #nav-posts .nav-previous a:active, #nav-posts .nav-next a:active {background-color: <?php echo $custom_color; ?>!important;}
		#branding #main-menu ul ul a:hover, #branding #main-menu ul ul ul a:hover {color: <?php echo $custom_color; ?>!important;}	
		#wpadminbar .quicklinks .menupop ul li a,#wpadminbar .quicklinks .menupop ul li a strong,#wpadminbar .quicklinks .menupop.hover ul li a, #wpadminbar.nojs .quicklinks .menupop:hover ul li a {color: #21759B!important;}			
		#wpadminbar * {color: #CCCCCC!important;}
		#wpadminbar.nojs .ab-top-menu > li.menupop:hover > .ab-item, #wpadminbar .ab-top-menu > li.menupop.hover > .ab-item {	color: #333!important;}							
	</style>
<?php
}
add_action( 'wp_head', 'keiran_insert_custom_color' );