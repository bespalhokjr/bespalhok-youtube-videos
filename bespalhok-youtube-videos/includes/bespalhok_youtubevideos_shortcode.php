<?php

    function bespalhok_youtubevideos_shortcode($atts){
        
        $html = '';

        $atts = shortcode_atts([
            'widget' => false,
            'titulo' => false,
            'quantidade_de_videos' => false,
        ], $atts);

        $widget = ($atts['widget']) ? 'widget' : '';

        $id_do_canal = get_option('bespalhok_youtubevideos_menu_secao_config_canal');
        $chave = get_option('bespalhok_youtubevideos_menu_secao_config_chave');
        
        $tempo_do_cache = get_option('bespalhok_youtubevideos_menu_secao_config_cache');
        $tempo_do_cache = (!(empty($tempo_do_cache))) ? intval($tempo_do_cache) : 600;
        
        $quantidade_de_videos = get_option('bespalhok_youtubevideos_menu_secao_config_quantidade');
        $quantidade_de_videos = (!(empty($quantidade_de_videos))) ? intval($quantidade_de_videos) : 4;
        if($atts['quantidade_de_videos']){ $quantidade_de_videos = $atts['quantidade_de_videos']; }

        $quantidade_de_colunas = get_option('bespalhok_youtubevideos_menu_secao_config_colunas');
        $quantidade_de_colunas = (!(empty($quantidade_de_colunas))) ? "_{$quantidade_de_colunas}_colunas" : '_2_colunas';
        
        $transient_name = 'bespalhok_youtubevideos_api_' . hash('md5', $id_do_canal . '_' . $chave . '_' . $quantidade_de_videos . '_' . $quantidade_de_colunas . '_' . $tempo_do_cache) ;
        
        $url_api = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$id_do_canal.'&maxResults='.$quantidade_de_videos.'&order=date&type=video&key='.$chave;

        $cache = get_transient( $transient_name );
        
        if(empty($cache)){
            $cache = get_web_page($url_api);
            $cache = json_decode($cache, true);
            date_default_timezone_set('America/Sao_Paulo');
            $cache['data'] = date('H:i:s-d/m/Y');
            set_transient($transient_name, $cache, ($tempo_do_cache * 60));
        }

        $videos = $cache;     
        
        if(isset($videos['error'])){
            $html .=  "<div style='color: red; font-weight: bold; text-align: center; border: solid 1px #ddd; padding: 20px; margin: 0 20px 10px;'> {$videos['error']['message']} </div>";
        }

        if(isset($videos['items'])){
            
            $videos = $videos['items'];

            $vds = [];
            $i = 0;

            foreach($videos as $v){
                $i++;
                if($v['id']['kind'] == 'youtube#video'){
                    $vds[] = [
                        'video_id' => $v['id']['videoId'],
                        'titulo' => $v['snippet']['title'],
                    ];
                }
                if($i >= $quantidade_de_videos){
                    break;
                }
            }

            if($atts['titulo']){
                $html .= '<h2 class="widget-title">'.$atts['titulo'].'</h2>';
            }

            $html .= '<div class="bespalhok_youtubevideos_container">';
            foreach($vds as $v){
                $html .= '<div class="bespalhok_youtubevideos_container__video '.$quantidade_de_colunas.' '.$widget.'">';

                    // verificamos se devemos ou nao carregar o iframe
                    $exibir_thumbnail_preview = (get_option('bespalhok_youtube_videos_thumbnail_preview') == 'on') ? true : false;
                    
                    if($exibir_thumbnail_preview){
                        
                        $img_preview_src = 'https://img.youtube.com/vi/'. $v['video_id'] .'/sddefault.jpg';

                        $html .= '<div data-id="'. $v['video_id'] .'" class="bespalhok_youtubevideos_container__video_container preview-thumb" style="background-image: url(' . $img_preview_src . ')"></div>';

                    }else{
                        $html .= '<div class="bespalhok_youtubevideos_container__video_container">';
                            $html .= '<iframe class="fitvidsignore" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" width="640" height="360" src="https://www.youtube.com/embed/'.$v['video_id'].'?controls=1&rel=0&playsinline=0&modestbranding=0&enablejsapi=1&mute=0"></iframe>';
                        $html .= '</div>';
                    }
                        
                    

                $html .= '</div>';
            }

            $html .= '</div>';
            $html .= '<script>console.log("cache videos data: '. $cache['data'] .' | duração: '.$tempo_do_cache.'")</script>';
        }

        return $html;
    }

    add_shortcode('youtube-videos', 'bespalhok_youtubevideos_shortcode');
    add_filter( 'widget_text', 'do_shortcode' );