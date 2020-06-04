<?php

/*
Plugin Name: South African ID Number Validator
Plugin URI: http://blusilva.com
Description: A simple plugin to check that a South African ID Number is valid.
Author: BluSilva
Author URI: http://blusilva.com
Version: 1.1
License: GPL2
*/

function bluCB1609_validator_css() {

    wp_enqueue_style( 'bluCB1609_validatorcss', plugin_dir_url( __FILE__ ) . 'assets/css.css' );
    wp_enqueue_style( 'bluCB1609_font-awesome', '//use.fontawesome.com/releases/v5.2.0/css/all.css' );
    wp_enqueue_script( 'bluCB1609_validatorjs', plugin_dir_url( __FILE__ ) . 'assets/js.js',  array('jquery') );

}

add_action( 'wp_enqueue_scripts', 'bluCB1609_validator_css' );

require_once 'validator-function.php';
require_once 'shortcode.php';