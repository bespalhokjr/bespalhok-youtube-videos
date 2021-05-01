<?php   

    function bespalhok_youtubevideos_menu_secao_config(){
            add_settings_section(
                'bespalhok_youtubevideos_menu_secao_config', // grupo
                'Configurações', // titulo
                'bespalhok_youtubevideos_menu_secao_config_detalhes', // callback
                'configurar-youtube-videos' // pagina
            );

            // chave API
            add_settings_field(
                'bespalhok_youtube_videos_chaveapi', // id
                'Chave API', // titulo
                'bespalhok_youtube_videos_chaveapi', // callback
                'configurar-youtube-videos', // pagina
                'bespalhok_youtubevideos_menu_secao_config' // secao
            );
            register_setting(
                'bespalhok_youtubevideos_menu_secao_config', // grupo
                'bespalhok_youtubevideos_menu_secao_config_chave', // name
                'verifica_chave' // call back
            );

            // Canal do Youtube
            add_settings_field(
                'bespalhok_youtube_videos_canal', // id
                'Canal Do Youtube', // titulo
                'bespalhok_youtube_videos_canal', // callback
                'configurar-youtube-videos', // pagina
                'bespalhok_youtubevideos_menu_secao_config' // secao
            );

            register_setting(
                'bespalhok_youtubevideos_menu_secao_config', // grupo
                'bespalhok_youtubevideos_menu_secao_config_canal', // name
                'verifica_canal' // call back
            );

            // Quantidade de Videos
             add_settings_field(
                'bespalhok_youtube_videos_quantidade', // id
                'Quantidade de Videos', // titulo
                'bespalhok_youtube_videos_quantidade', // callback
                'configurar-youtube-videos', // pagina
                'bespalhok_youtubevideos_menu_secao_config' // secao
            );

            register_setting(
                'bespalhok_youtubevideos_menu_secao_config', // grupo
                'bespalhok_youtubevideos_menu_secao_config_quantidade', // name
                'verifica_quantidade' // call back
            );

            // Quantidade de Colunas
            add_settings_field(
                'bespalhok_youtube_videos_colunas', // id
                'Quantidade de Colunas', // titulo
                'bespalhok_youtube_videos_colunas', // callback
                'configurar-youtube-videos', // pagina
                'bespalhok_youtubevideos_menu_secao_config' // secao
            );

            register_setting(
                'bespalhok_youtubevideos_menu_secao_config', // grupo
                'bespalhok_youtubevideos_menu_secao_config_colunas', // name
                'verifica_colunas' // call back
            );

            // Cache
            add_settings_field(
                'bespalhok_youtube_videos_cache', // id
                'Tempo do cache', // titulo
                'bespalhok_youtube_videos_cache', // callback
                'configurar-youtube-videos', // pagina
                'bespalhok_youtubevideos_menu_secao_config' // secao
            );

            register_setting(
                'bespalhok_youtubevideos_menu_secao_config', // grupo
                'bespalhok_youtubevideos_menu_secao_config_cache', // name
                'verifica_cache' // call back
            );
    }
    function bespalhok_youtubevideos_menu_secao_config_detalhes(){
        ?> <p>Preencha as configurações abaixo</p> <?php
    }

    function bespalhok_youtube_videos_chaveapi(){
        // $chave = get_option('bespalhok_youtubevideos_menu_secao_config_chave');
        $chave = substr( esc_attr(get_option('bespalhok_youtubevideos_menu_secao_config_chave')), 0, 10) . '...';
        ?>
            <input style="width: 100%; max-width: 400px;" type="text" id="bespalhok_youtubevideos_menu_secao_config_chave" name="bespalhok_youtubevideos_menu_secao_config_chave" value="<?php echo $chave; ?>">
            <p style="margin-left: 2px; font-size: 11px; margin-top: 5px;">não sabe onde conseguir chave API youtube ? <a target="_blank" href="https://www.google.com/search?q=Como+obter+a+API+do+YouTube">clique aqui</p>
        <?php
    }
    function bespalhok_youtube_videos_canal(){
        ?>
            <input style="width: 100%; max-width: 400px;" type="text" id="bespalhok_youtubevideos_menu_secao_config_canal" name="bespalhok_youtubevideos_menu_secao_config_canal" value="<?php echo esc_attr(get_option('bespalhok_youtubevideos_menu_secao_config_canal')); ?>">
            <p style="margin-left: 2px; font-size: 11px; margin-top: 5px;">https://www.youtube.com/channel/<b style="font-weight: 900;">xxxxxxxxxxxxxxxx</b></p>
        <?php
    }

    function bespalhok_youtube_videos_quantidade(){
        ?>
            <input style="width: 100%; max-width: 400px;" type="number" min="1" max="50" id="bespalhok_youtubevideos_menu_secao_config_quantidade" name="bespalhok_youtubevideos_menu_secao_config_quantidade" value="<?php echo esc_attr(get_option('bespalhok_youtubevideos_menu_secao_config_quantidade')); ?>">
            <p style="margin-left: 2px; font-size: 11px; margin-top: 5px;">quantidade de vídeos a serem exibidos</p>
        <?php
    }

    function bespalhok_youtube_videos_colunas(){
        $q = get_option('bespalhok_youtubevideos_menu_secao_config_colunas');
        ?>
            <select style="width: 100%; max-width: 400px;" name="bespalhok_youtubevideos_menu_secao_config_colunas" id="bespalhok_youtubevideos_menu_secao_config_colunas">
                <option value="0" disabled selected>Colunas</option>
                <option <?php if($q == '2'){echo 'selected'; } ?> value="2">2</option>
                <option <?php if($q == '3'){echo 'selected'; } ?> value="3">3</option>
                <option <?php if($q == '4'){echo 'selected'; } ?> value="4">4</option>
                <option <?php if($q == '5'){echo 'selected'; } ?> value="5">5</option>
            </select>
            <p style="margin-left: 2px; font-size: 11px; margin-top: 5px;">quantidade de colunas ao exibir os vídeos</p>
        <?php
    }

    function bespalhok_youtube_videos_cache(){
        $q = get_option('bespalhok_youtubevideos_menu_secao_config_cache');
        ?>  
            <select style="width: 100%; max-width: 400px;" name="bespalhok_youtubevideos_menu_secao_config_cache" id="bespalhok_youtubevideos_menu_secao_config_cache">
                <option value="0" disabled selected>Duração do Cache</option>
                <option <?php if($q == '15'){echo 'selected'; } ?> value="15">15 minutos</option>
                <option <?php if($q == '30'){echo 'selected'; } ?> value="30">30 minutos</option>
                <option <?php if($q == '60'){echo 'selected'; } ?> value="60">01 Hora</option>
                <option <?php if($q == '600'){echo 'selected'; } ?> value="600">10 Horas</option>
            </select>
            <p style="margin-left: 2px; font-size: 11px; margin-top: 5px;">quanto maior o tempo de cache, menos requisições são feitas para API</p>
        <?php
    }

    // Renderiza o conteúdo da página
    function bespalhok_youtubevideos_menu_pagina_render(){
        ?>
            <h1>Configuração do Youtube Videos</h1>
            <form method="post" action="options.php">
                <?php
                    // mensagens de sucesso e erros
                    settings_errors();

                    do_settings_sections('configurar-youtube-videos');
                    settings_fields('bespalhok_youtubevideos_menu_secao_config');

                    submit_button();
                ?>
            </form>

            <hr>
            <h2>Como Usar?</h2>
            <p>Copie e cole o shortcode abaixo, ou use o Widget</p>
            <input type="text" value="[youtube-videos]" style="margin-bottom: 10px;">
            <hr>
        <?php
    }

    // configurações do menu
    function bespalhok_youtubevideos_menu(){
        add_menu_page(
            'Configurar Youtube Videos',
            'Youtube Videos',
            'manage_options',
            'configurar-youtube-videos',
            'bespalhok_youtubevideos_menu_pagina_render',
            'dashicons-format-video',
            -1
        );
    }

    add_action('admin_menu', 'bespalhok_youtubevideos_menu');
    add_action('admin_menu', 'bespalhok_youtubevideos_menu_secao_config');
    


    function verifica_canal($canal){
        if(strlen($canal) <= 4){
            // mante o valor antigo
            $canal = get_option('bespalhok_youtubevideos_menu_secao_config_canal');

            add_settings_error(
                'mensagem_erro_canal',
                'erro_canal',
                'o campo de canal parece invalido',
                'erro'
            );
        }
        return $canal;
    }

    function verifica_chave($chave){
        //se a chave for menor que 30 mantém o valor original
        if(strlen($chave) <= 30){
            // mante o valor antigo
            $chave = get_option('bespalhok_youtubevideos_menu_secao_config_chave');
        }
        return $chave;
    }