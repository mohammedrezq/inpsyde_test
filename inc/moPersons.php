<?php 

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class mpPerson {

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_mo_persons'));

    }

    
    public function enqueue_mo_persons() {
        wp_enqueue_script( 'mo_js_script',  plugins_url('assets/test.js', realpath(__DIR__)), array('jquery'), time(), true );
    }
}

$moPerson = new mpPerson();