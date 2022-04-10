<?php
/**
* Sanitize callback function for theme customization
* 
* @package Tech_Teller
*/

/**
 * HTML sanitization callback example.
 *
 * - Sanitization: html
 * - Control: text, textarea
 *
 * @param string $html HTML to sanitize.
 * @return string Sanitized HTML.
 */
function tech_teller_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}

/**
 * HEX Color sanitization callback example.
 *
 * - Sanitization: hex_color
 * - Control: text, WP_Customize_Color_Control
 *
 */
function tech_teller_sanitize_hex_color( $hex_color, $setting ) {
	// Sanitize $input as a hex value without the hash prefix.
	$hex_color = sanitize_hex_color( $hex_color );
	
	// If $input is a valid hex value, return it; otherwise, return the default.
	return ( ! is_null( $hex_color ) ? $hex_color : $setting->default );
}

/**
 * Select sanitization callback example.
 *
 * - Sanitization: select
 * - Control: select, radio
 */
function tech_teller_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitization Function - Multiple Categories
 * 
 * @param $input, $setting
 * @return $input
 */
if ( !function_exists( 'tech_teller_sanitize_multiple_cat_select' ) ) {

    function tech_teller_sanitize_multiple_cat_select( $input, $setting ) {

        if ( !empty($input) ){

            $input = array_map( 'sanitize_text_field', $input );
        }

        return $input;
    } 
}

/**
 * Sanitization Number
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists( 'tech_teller_sanitize_number' ) ) {

    function tech_teller_sanitize_number( $input, $setting ) {
        
        $number = absint( $input );
        // If the input is a positibe number, return it; otherwise, return the default.
        return ( $number ? $number : $setting->default );
    }
}

/**
 * Sanitize checkbox.
 *
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
if ( ! function_exists( 'tech_teller_sanitize_checkbox' ) ) :

	function tech_teller_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}

endif;

/**
 * Drop-down Pages sanitization callback example.
 *
 * - Sanitization: dropdown-pages
 * - Control: dropdown-pages
 * 
 */
function tech_teller_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/**
 * Number Range sanitization callback example.
 *
 * - Sanitization: number_range
 * 
 */
function tech_teller_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : $number );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * Sanitize image.
 *
 * @since 1.0.1
 *
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @param string               $image Image filename.
 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
if ( ! function_exists( 'tech_teller_sanitize_image' ) ) :

	function tech_teller_sanitize_image( $image, $setting ) {

		$mimes = array(
		'jpg|jpeg|jpe' =>	'image/jpeg',
		'gif'          =>	'image/gif',
		'png'          =>	'image/png',
		'bmp'          =>	'image/bmp',
		'tif|tiff'     =>	'image/tiff',
		'ico'          =>	'image/x-icon',
		);

		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );

		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );

	}

endif;