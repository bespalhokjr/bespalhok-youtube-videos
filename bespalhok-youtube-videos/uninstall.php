<?php
    
    // checamos se foi uma requisição do wordpress, para evitar acesso externo
    if( !(defined('WP_UNINSTALL_PLUGIN')) ){ die(); }


    // apagamos algumas coisas para evitar ficar lixo no banco de dados

    global $wpdb;
    $wpdb->query(" DELETE from wp_options WHERE option_name = 'bespalhok_youtubevideos_menu_secao_config_canal'");
    $wpdb->query(" DELETE from wp_options WHERE option_name = 'bespalhok_youtubevideos_menu_secao_config_chave'");
    $wpdb->query(" DELETE from wp_options WHERE option_name = 'bespalhok_youtubevideos_menu_secao_config_quantidade'");
