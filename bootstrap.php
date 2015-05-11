<?php

/*
 * Plugin Name: Papi: Property Comments
 * Description: Select specific comments
 * Version: 1.0.0
 * Author: Ralev.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Include Property Comments.
 *
 * @since 1.0.0
 */

function include_property_comments () {
  include_once('class-papi-property-comments.php');
}

add_action('papi_include_properties', 'include_property_comments');
