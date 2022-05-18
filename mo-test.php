<?php
/**
 * Plugin Name:       Mo Test
 * Description:       A Gutenberg block to show your pride! This block enables you to type text and style it with the color font Gilbert from Type with Pride.
 * Version:           0.1.0
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mo-test
 *
 * @package           create-block
 */

/**
 *  Exit if accessed directly.
 */ 
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Define Paths
*/

define('PLUGIN_PATH', plugin_dir_path(__FILE__));


/**
 * Add in custom fields.
 */
require_once PLUGIN_PATH . 'class-backend.php';

/**
 * Person HTMl
 */
require_once PLUGIN_PATH . 'inc/personHTML.php';

/**
 * Person Frontend HTML
 */
require_once PLUGIN_PATH . 'inc/personFrontendHTML.php';


class MoTest {
    public function __construct() {
        add_action('init', array($this, 'create_block_mo_test_block_init'));
        add_action('init', array($this, 'mo_custom_post_type'));
        add_filter( 'register_post_type_args', array($this, 'mo_persons_type_args'), 10, 2 );
        add_action('rest_api_init', array($this, 'mo_persons_register_rest_routes'));
        add_action('wp_enqueue_scripts', array($this, 'mo_persons_frontend_scripts') );
    }

    public function mo_persons_register_rest_routes() {
        register_rest_route('inpsyde/v1', '/getHtml', array(
            'methods' => 'GET',
            'callback' => array($this, 'mo_persons_get_persons'),
        ));
    }

    public function mo_persons_get_persons($data) {
        return generatePersonHTML($data['personId']);
    }
    
    /**
     * Registers the block using the metadata loaded from the `block.json` file.
     * Behind the scenes, it registers also all assets so they can be enqueued
     * through the block editor in the corresponding context.
     *
     * @see https://developer.wordpress.org/reference/functions/register_block_type/
     */

    public function create_block_mo_test_block_init() {
        register_block_type_from_metadata( __DIR__ . '/build',
            [
                'render_callback' => [$this, 'mo_person_custom_block_render'],
            ]
        );
    }

    public function mo_persons_frontend_scripts() {
        wp_register_script('personsTest', plugin_dir_url(__FILE__) . 'assets/test.js', array('jquery'), time(), true);
        wp_enqueue_script('personsTest');
        wp_enqueue_style('bootstrap_style_modal', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css', array(), '4.0.0', 'all');
        wp_enqueue_script('bootstrap_script_popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', array('jquery'), '1.12.9', true);
        wp_enqueue_script('bootstrap_script_modal', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js', array('jquery', 'bootstrap_script_popper'), '4.0.0', true);
        
    }

    public function mo_person_custom_block_render($attributes) {
        if($attributes['personId']) {
            return generatePersonFrontendHTML($attributes['personId']);
            
            // '<div class="mo-test-block">
            //     <h1>Mo Test Block</h1>
            //     <p>This is a Gutenberg block to show your pride! This block enables you to type text and style it with the color font Gilbert from Type with Pride.</p>
            // </div>';

        } else {
            return NULL;
        }
    }

    public function mo_custom_post_type() {
        register_post_type('mo_persons',
            array(
                'labels'      => array(
                    'name'          => __('Persons', 'textdomain'),
                    'singular_name' => __('Person', 'textdomain'),
                ),
                    'public'      => true,
                    'has_archive' => false,
                    'show_in_rest' => true,
                       'supports' => array('title', 'thumbnail')
            )
        );
    }

    /**
     * Add REST API support to an already registered post type.
     */

    public function mo_persons_type_args( $args, $post_type ) {
 
        if ( 'mo_persons' === $post_type ) {
            $args['show_in_rest'] = true;
     
            // Optionally customize the rest_base or rest_controller_class
            $args['rest_base']             = 'mo_persons';
            $args['rest_controller_class'] = 'WP_REST_Posts_Controller';
        }
     
        return $args;
    }
    


}

$moTest = new MoTest();




