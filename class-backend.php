<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 *  Exit if accessed directly.
 */ 
if( !defined( 'ABSPATH' ) ) exit;

class Persons
{


    public function __construct()
    {
        add_action('carbon_fields_register_fields', array($this, 'moTest'));

        add_action('after_setup_theme', array($this, 'wadi_backend_load'));
    }


    /**
     * Polls backend
     */

    public function moTest()
    {

        // $poll_item_label = array(
        //     'plural_name' => 'Poll Items',
        //     'singular_name' => 'Poll Item',
        // );
        Container::make('post_meta', __('Persons Form'))
            ->where('post_type', '=', 'mo_persons')
            ->add_tab(__('Persons Info'), array(
                Field::make('text','first_name', 'First Name')
                ->set_visible_in_rest_api( $visible = true ),
                Field::make('text','last_name', 'Last Name')
                ->set_visible_in_rest_api( $visible = true ),
                Field::make('rich_text', 'description', 'Description')
                ->set_visible_in_rest_api( $visible = true ),
                Field::make('image', 'image', 'Image')
                ->set_visible_in_rest_api( $visible = true ),
                Field::make('text', 'position', 'Position')
                ->set_visible_in_rest_api( $visible = true ),
            )
        )
            ->add_tab(__('Persons Social Media'), array(
                Field::make('text', 'github', 'Github')
                ->set_visible_in_rest_api( $visible = true ),
                Field::make('text', 'linkedin', 'Linkedin')
                ->set_visible_in_rest_api( $visible = true ),
                Field::make('text', 'xing', 'Xing')
                ->set_visible_in_rest_api( $visible = true ),
                Field::make('text', 'facebook', 'Facebook')
                ->set_visible_in_rest_api( $visible = true ),
            )
        );
    }




    public function wadi_backend_load()
    {
        require_once('vendor/autoload.php');        
        // To solve on live sites: https://stackoverflow.com/questions/53128991/carbon-fields-doest-show-maked-fields
        define('Carbon_Fields\URL', trailingslashit(plugin_dir_url(__FILE__)) . 'vendor/htmlburger/carbon-fields/');
        \Carbon_Fields\Carbon_Fields::boot();
    }
}


new Persons;
