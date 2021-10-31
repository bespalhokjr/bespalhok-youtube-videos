<?php
    /*
        Plugin Name: Bespalhok Youtube Videos
        Text Domain: bespalhok-youtube-videos
        Description: Adicione os últimos videos de um canal do youtube
        Author: Paulo R Bespalhok Junior
        Author URI: bespalhok.dev
    */

    // checamos se foi uma requisição do wordpress, para evitar acesso externo
    if( !( defined('ABSPATH') ) ){ die; }

    // libs
    include_once(plugin_dir_path(__FILE__) . '/lib/get_web_page.php');

    // scripts
    include_once(plugin_dir_path(__FILE__) . '/includes/bespalhok_youtubevideos_scripts.php');

    // css
    include_once(plugin_dir_path(__FILE__) . '/includes/bespalhok_youtubevideos_css.php');

    // Widget
    include_once(plugin_dir_path(__FILE__) . '/includes/bespalhok_youtubevideos_widget.php');
    
    // Menu
    include_once(plugin_dir_path(__FILE__) . '/includes/bespalhok_youtubevideos_menu.php');
    
    // shortcode
    include_once(plugin_dir_path(__FILE__) . '/includes/bespalhok_youtubevideos_shortcode.php');