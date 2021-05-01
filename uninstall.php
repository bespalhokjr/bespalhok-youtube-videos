<?php

    if( !(defined('WP_UNINSTALL_PLUGIN')) ){ die(); }

    global $wpdb;
    $wpdb->query(" DELETE from wp_options WHERE option_name = 'bespalhok_youtubevideos_menu_secao_config_canal'");
    $wpdb->query(" DELETE from wp_options WHERE option_name = 'bespalhok_youtubevideos_menu_secao_config_chave'");
    $wpdb->query(" DELETE from wp_options WHERE option_name = 'bespalhok_youtubevideos_menu_secao_config_quantidade'");
