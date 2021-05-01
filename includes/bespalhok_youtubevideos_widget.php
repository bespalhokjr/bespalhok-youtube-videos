<?php
    Class BespalhokYoutubeVideos extends WP_Widget{

            public function __construct(){
                parent::__construct(
                    'bespalhok_youtube_videos', 
                    'Youtube Videos',
                    [
                        'description' => 'Últimos videos de um canal do Youtube',
                    ]
                );
            }

            public function form($instance){
                $html = '';

                $html .= '<p>';
                    $html .= '<label>Título:</label>';
                    $html .= '<input style="width: 100%;" id="'.$this->get_field_id('titulo').'" type="text" name="'.$this->get_field_name('titulo').'" value="'.$instance['titulo'].'" />';
                $html .= '</p>';

                $html .= '<p>';
                $html .= '<label>Qnt. de Videos:</label>';
                $html .= '<input style="width: 100%;" id="'.$this->get_field_id('quantidade_de_videos').'" type="number" min="1" name="'.$this->get_field_name('quantidade_de_videos').'" value="'.$instance['quantidade_de_videos'].'" />';
            $html .= '</p>';
                
                echo($html);
            }

            public function update($new_instance, $old_instance){

                // QUANTIDADE
                $quantidade = $new_instance['quantidade_de_videos'];
                $quantidade = strip_tags($quantidade);
                $quantidade = intval($quantidade);
                $quantidade = ($quantidade > 0) ? $quantidade : 1;

                $instance['quantidade_de_videos'] = $quantidade;

                // TÍTULO
                $titulo = $new_instance['titulo'];  
                $titulo = strip_tags($titulo);

                $instance['titulo'] = $titulo;

                return $instance;
            }
            

            public function widget($args, $instance){
                echo do_shortcode('[youtube-videos widget="1" titulo="'.$instance['titulo'].'" quantidade_de_videos="'.$instance['quantidade_de_videos'].'" ]');
            }
    }

    function init_bespalhok_youtube_videos(){
        register_widget('BespalhokYoutubeVideos');
    }

    add_action('widgets_init', 'init_bespalhok_youtube_videos');