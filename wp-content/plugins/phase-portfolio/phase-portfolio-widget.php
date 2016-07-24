<?php
    function phase_portfolio_widget(){
        register_widget('Phase_Portfolio_Widget');
    }
    add_action('widgets_init','phase_portfolio_widget');

    class Phase_Portfolio_Widget extends WP_Widget{
        function __construct(){
            $args = array(
                'description' => esc_html__('A widget to display your portfolio','phase')
            );
            parent::__construct('phase_portfolio_widget',esc_html__('Phase Portfolio Widget','phaes'),$args);
        }

        public function widget($args,$instance){
            extract($args);
            echo wp_kses_post($before_widget);
            if($instance['amount']){
                $amount = $instance['amount'];
            }else{
                $amount = 1;
            }
            ?>
            <div id="phase-portfolio-widget"<?php if($amount > 1){echo ' class="grid"';}?>>
            <?php
                if($instance['title']){
                    echo wp_kses_post($before_title.apply_filters('widget_title',$instance['title']).$after_title);
                }
                $phase_portfolio_arg = array(
                    'post_type'=>'portfolio',
                    'posts_per_page'=>$amount,
                    'ignore_sticky_posts'=>true
                    );
                $phase_portfolio_query = new WP_query($phase_portfolio_arg);
                if($phase_portfolio_query->have_posts()){
                    while($phase_portfolio_query->have_posts()):$phase_portfolio_query->the_post();
                        $image_id = get_post_thumbnail_id();
                        if($amount == 1){
                            $image_url = wp_get_attachment_image_src($image_id,'large',true);
                            echo '
                                <li class="piece">
                                    <a class="overlay" href="'.get_the_permalink().'"><i class="icon-search"></i></a>
                                    <img src="'.$image_url[0].'" alt="'.get_the_title().'">
                                </li>
                            ';
                        }else{
                            $image_url = wp_get_attachment_image_src($image_id,'medium',true);
                            echo '
                                <li class="piece" style="background-image:url('.$image_url[0].')">
                                    <a class="overlay" href="'.get_the_permalink().'"><i class="icon-search"></i></a>
                                </li>
                            ';
                        }
                    endwhile;
                    wp_reset_postdata();
                }
            ?>
            </div>

            <?php
                echo wp_kses_post($after_widget);
        }

        public function form($instance){
            $defaults = array(
                'title'=>'My Portfolio',
                'amount'=>1
            );
            $instance = wp_parse_args((array)$instance,$defaults);
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'title'));?>"><?php _e('Title:','phase')?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" value="<?php echo esc_attr($instance['title']);?>" type="text"/>
                <br>
                <br>
                <label for="<?php echo esc_attr($this->get_field_id('amount'));?>"><?php _e('Amount to display:','phase')?></label>
                <input id="<?php echo esc_attr($this->get_field_id('amount'));?>" name="<?php echo esc_attr($this->get_field_name('amount'));?>" value="<?php echo esc_attr($instance['amount']);?>" type="number" min="0" size="2"/>
            </p>
        <?php
        }
        public function update($new_instance,$old_instance){
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);
            $instance['amount'] = strip_tags($new_instance['amount']);
            return $instance;
        }
    }

    function phase_portfolio_enqueue_portfolio_scripts(){
        wp_enqueue_style('portfolio_css',plugins_url('phase-portfolio/css/style.css'));
        wp_enqueue_style('portfolio_icon_css',plugins_url('phase-portfolio/css/icon.css'));
    }
    add_action('wp_enqueue_scripts','phase_portfolio_enqueue_portfolio_scripts');

?>