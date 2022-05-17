<?php
/**
 * Plugin Name:       Mo Test
 * Description:       Persons Block for inpsyde job application
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
require_once PLUGIN_PATH . 'inc/moPersons.php';


class MoTest {
    public function __construct() {
        add_action('init', array($this, 'create_block_mo_test_block_init'));
        add_action('init', array($this, 'mo_custom_post_type'));
        add_filter( 'register_post_type_args', array($this, 'mo_persons_type_args'), 10, 2 );
    }


    
    /**
     * Registers the block using the metadata loaded from the `block.json` file.
     * Behind the scenes, it registers also all assets so they can be enqueued
     * through the block editor in the corresponding context.
     *
     * @see https://developer.wordpress.org/reference/functions/register_block_type/
     */

    public function create_block_mo_test_block_init() {
        register_block_type_from_metadata( __DIR__ . '/build'
        );
    }

    public function mo_person_custom_block_render($attributes) {
        if($attributes['personId']) {
            return generatePersonHTML($attributes['personId']);
            
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




