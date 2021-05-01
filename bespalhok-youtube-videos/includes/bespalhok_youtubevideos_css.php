<?php

    function bespalhok_youtubevideos_css(){
        wp_enqueue_style(
            'bespalhok_youtubevideos_css', // identificador
            plugins_url() . '/bespalhok-youtube-videos/css/bespalhok_youtubevideos.css', // css
            null, // dependencias
            null, // versionamento
            null // media
        );
    }

    add_action('wp_enqueue_scripts', 'bespalhok_youtubevideos_css');