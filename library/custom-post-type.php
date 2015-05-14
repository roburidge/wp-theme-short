<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

/*
  looking for custom meta boxes?
  check out this fantastic tool:
  https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
*/

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

require_once('CMB2/cmb_field_map/cmb-field-map.php');

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function short_show_if_front_page( $cmb ) {
  // Don't show this metabox if it's the front page template
  if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
    return false;
  }
  return true;
}

add_action( 'cmb2_init', 'short_register_front_page_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function short_register_front_page_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_short_front_page_';

  /**
   * Sample metabox to demonstrate each field type included
   */
  $cmb_demo = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Featured Links', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    'show_on_cb'    => 'short_show_if_front_page', // function should return a bool value
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true // Show field names on the left
  ) );

  $cmb_demo->add_field( array(
    'name'       => __( 'Test Text', 'cmb2' ),
    'desc'       => __( 'field description (optional)', 'cmb2' ),
    'id'         => $prefix . 'text',
    'type'       => 'text',
    'show_on_cb' => 'yourprefix_hide_if_no_cats'
  ) );

}

add_action( 'cmb2_init', 'short_register_contact_template_metabox' );
/**
 * Define the metabox and field configurations.
 */
function short_register_contact_template_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_short_contact_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'           => 'contact-information',
    'title'        => 'Contact Information',
    'object_types' => array( 'page' ), // post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'page-contact.php' ),
    'context'      => 'normal', //  'normal', 'advanced', or 'side'
    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
    'show_names'   => true // Show field names on the left
  ) );

  $cmb->add_field( array(
    'name'    => 'Google Maps API Key',
    'desc'    => 'Get your API key: https://console.developers.google.com/',
    'default' => 'API_KEY',
    'id'      => $prefix . 'api_key',
    'type'    => 'text'
  ) );

  $cmb->add_field( array(
    'name' => 'Map Location',
    'desc' => 'Drag the marker to set the exact location',
    'id' => $prefix . 'location',
    'type' => 'pw_map'
    // 'split_values' => true // Save latitude and longitude as two separate fields
  ) );

}

add_action( 'cmb2_init', 'short_register_about_template_metabox' );
/**
 * Define the metabox and field configurations.
 */
function short_register_about_template_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_short_about_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'           => 'about-page',
    'title'        => 'About Page',
    'object_types' => array( 'page' ), // post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'page-about.php' ),
    'context'      => 'normal', //  'normal', 'advanced', or 'side'
    'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
    'show_names'   => true // Show field names on the left
  ) );

  $cmb->add_field( array(
    'name' => 'Intro Text',
    'desc' => 'Text block immediately after page title.',
    'id' => $prefix . 'intro_text',
    'type' => 'textarea'
  ) );

  $cmb->add_field( array(
    'name'    => 'Left Hero Image',
    'desc'    => 'Upload an image or enter an URL.',
    'id'      => $prefix . 'left_hero_image',
    'type'    => 'file',
    // Optionally hide the text input for the url:
    'options' => array(
      'url' => false,
    )
  ) );

  $cmb->add_field( array(
    'name'    => 'Right Hero Image',
    'desc'    => 'Upload an image or enter an URL.',
    'id'      => $prefix . 'right_hero_image',
    'type'    => 'file',
    // Optionally hide the text input for the url:
    'options' => array(
      'url' => false,
    )
  ) );

}


/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class Short_Admin {
  /**
   * Option key, and option page slug
   * @var string
   */
  private $key = 'short_options';
  /**
   * Options page metabox id
   * @var string
   */
  private $metabox_id = 'short_option_metabox';
  /**
   * Options Page title
   * @var string
   */
  protected $title = '';
  /**
   * Options Page hook
   * @var string
   */
  protected $options_page = '';
  /**
   * Constructor
   * @since 0.1.0
   */
  public function __construct() {
    // Set our title
    $this->title = __( 'Site Options', 'short' );
  }
  /**
   * Initiate our hooks
   * @since 0.1.0
   */
  public function hooks() {
    add_action( 'admin_init', array( $this, 'init' ) );
    add_action( 'admin_menu', array( $this, 'add_options_page' ) );
    add_action( 'cmb2_init', array( $this, 'add_options_page_metabox' ) );
  }
  /**
   * Register our setting to WP
   * @since  0.1.0
   */
  public function init() {
    register_setting( $this->key, $this->key );
  }
  /**
   * Add menu options page
   * @since 0.1.0
   */
  public function add_options_page() {
    $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
    // add_action( "admin_head-{$this->options_page}", array( $this, 'enqueue_js' ) );
  }
  /**
   * Admin page markup. Mostly handled by CMB2
   * @since  0.1.0
   */
  public function admin_page_display() {
    ?>
    <div class="wrap cmb2-options-page <?php echo $this->key; ?>">
      <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
      <?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
    </div>
    <?php
  }
  /**
   * Add the options metabox to the array of metaboxes
   * @since  0.1.0
   */
  function add_options_page_metabox() {
    $cmb = new_cmb2_box( array(
      'id'      => $this->metabox_id,
      'hookup'  => false,
      'show_on' => array(
        // These are important, don't remove
        'key'   => 'options-page',
        'value' => array( $this->key, )
      ),
    ) );

    // Set our CMB2 fields

    // section title
    $cmb->add_field( array(
      'name' => __( 'Contact Details', 'cmb2' ),
      'desc' => __( 'These are used in the site footer and on the contact page template.', 'cmb2' ),
      'id'   => 'contact_title',
      'type' => 'title'
    ) );
    // email address
    $cmb->add_field( array(
      'name' => 'Email Address',
      'default' => 'shorttheme@test.com',
      'id'   => 'contact_email',
      'type' => 'text_email'
    ) );
    // phone number
    $cmb->add_field( array(
      'name'    => 'Phone Number',
      'default' => '+44 (0) 1234 567890',
      'id'      => 'contact_phone',
      'type'    => 'text'
    ) );
    // street address
    $cmb->add_field( array(
      'name' => 'Street Address',
      'id' => 'contact_address',
      'type' => 'wysiwyg'
    ) );

    // section title: social links
    $cmb->add_field( array(
      'name' => __( 'Social Links', 'cmb2' ),
      'desc' => __( 'These are used for the external links to social networks in the footer.', 'cmb2' ),
      'id'   => 'social_title',
      'type' => 'title'
    ) );

    $cmb->add_field( array(
      'name' => __( 'Twitter URL', 'cmb' ),
      'default' => 'https://twitter.com/',
      'id'   => 'social_twitterurl',
      'type' => 'text_url'
      // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ) // Array of allowed protocols
    ) );

    $cmb->add_field( array(
      'name' => __( 'LinkedIn URL', 'cmb' ),
      'default' => 'https://www.linkedin.com/',
      'id'   => 'social_linkedinurl',
      'type' => 'text_url'
      // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ) // Array of allowed protocols
    ) );

  }
  /**
   * Public getter method for retrieving protected/private variables
   * @since  0.1.0
   * @param  string  $field Field to retrieve
   * @return mixed          Field value or exception is thrown
   */
  public function __get( $field ) {
    // Allowed fields to retrieve
    if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
      return $this->{$field};
    }
    throw new Exception( 'Invalid property: ' . $field );
  }
}
/**
 * Helper function to get/return the Short_Admin object
 * @since  0.1.0
 * @return Short_Admin object
 */
function short_admin() {
  static $object = null;
  if ( is_null( $object ) ) {
    $object = new Short_Admin();
    $object->hooks();
  }
  return $object;
}
/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function short_get_option( $key = '' ) {
  return cmb2_get_option( short_admin()->key, $key );
}
// Get it started
short_admin();
