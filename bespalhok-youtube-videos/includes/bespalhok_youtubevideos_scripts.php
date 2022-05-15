<?php

    function bespalhok_youtubevideos_scripts(){
        wp_enqueue_script(
            'bespalhok_youtubevideos_script', // identificador
            plugins_url() . '/bespalhok-youtube-videos/js/bespalhok_youtubevideos_script.js', // script
            ['jquery'], // dependencias
            null, // versionamento
            false // no footer
        );
    }

    add_action('wp_enqueue_scripts', 'bespalhok_youtubevideos_scripts');