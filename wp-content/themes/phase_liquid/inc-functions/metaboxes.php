<?php
    $metaboxes=array(
        'quote_posts' => array(
            'title' => __('Quote Post Options','liquid'),
            'applicableto' => 'post',
            'location' => 'side',
            'display_condition' => 'post-format-quote',
            'priority' => 'high',
            'fields' => array(
                'quote_author' => array(
                    'title'=>__('Quote Author: ','liquid'),
                    'type' => 'text',
                    'size'=>40
                )
            )
        ),
        'audio_posts' => array(
            'title' => __('Audio Post Options','liquid'),
            'applicableto' => 'post',
            'location' => 'side',
            'display_condition' => 'post-format-audio',
            'priority' => 'high',
            'fields' => array(
                'audio_url' => array(
                    'title'=>__('Audio URL (Soundcloud): ','liquid'),
                    'type' => 'text',
                    'size'=>40
                )
            )
        ),
        'video_posts' =>array(
            'title' => __('Video Post Options','liquid'),
            'applicableto' => 'post',
            'location' => 'side',
            'display_condition' => 'post-format-video',
            'priority' => 'high',
            'fields' => array(
                'video_url' => array(
                    'title'=>__('Video URL (Youtube or Vimeo): ','liquid'),
                    'type' => 'text',
                    'size'=>40
                )
            )
        ),
        'page_options' =>array(
            'title' => __('Page Options','liquid'),
            'applicableto' => 'page',
            'location' => 'side',
            'priority' => 'high',
            'fields' => array(
                'attached_images_as_slideshow' => array(
                    'title'=>__('Attached Images as Slideshow','liquid'),
                    'type' => 'checkbox'
                ),
                'display_social_sharing_buttons' => array(
                    'title'=>__('Display Social Sharing Buttons','liquid'),
                    'type' => 'checkbox'
                )
            )
        ),
        'portfolio_posts' => array(
            'title' => __('Portfolio Options','liquid'),
            'applicableto' => 'portfolio',
            'location' => 'side',
            'priority' => 'high',
            'fields' => array(
                'portfolio_gallery_slideshow'=>array(
                    'title'=>__('Gallery Slideshow<br><br>','liquid'),
                    'type'=>'checkbox'
                ),
                'portfolio_client_name'=>array(
                    'title'=>__('Client Name:','liquid'),
                    'type'=>'text',
                    'size'=>40
                ),
                'portfolio_work_url'=>array(
                    'title'=>__('Work URL: ','liquid'),
                    'type'=>'text',
                    'size'=>40
                ),
                'portfolio_purchase_price'=>array(
                    'title'=>__('Purchase Price: ','liquid'),
                    'type'=>'text',
                    'size'=>40
                ),
                'portfolio_purchase_url'=>array(
                    'title'=>__('Purchase URL: ','liquid'),
                    'type'=>'text',
                    'size'=>40
                )
            )
        )
    );

    function phase_format_metabox(){
        global $metaboxes;
        if(!empty($metaboxes)){
            foreach($metaboxes as $id => $metabox){
                add_meta_box($id,$metabox['title'],'phase_show_metaboxes',$metabox['applicableto'],$metabox['location'],$metabox['priority'],$id);
        	}
        }
    }
    add_action('admin_init','phase_format_metabox');

    function phase_show_metaboxes($post,$args){
        global $metaboxes;
        $custom = get_post_custom($post->ID);
        $fields = $tabs = $metaboxes[$args['id']]['fields'];
        $output = '<input type="hidden" name="post_format_meta_box_nonce" value="'.wp_create_nonce(basename( __FILE__)).'"/>';
        if(sizeof($fields)){
            foreach($fields as $id=>$field){
                switch($field['type']){
                    default:
                    case"text":
                    if(isset($custom[$id][0])){
                        $customid = $custom[$id][0];
                    }else{
                        $customid = '';
                    }
                    $output .= '<label for="'.$id.'">'.$field['title'].'</label><input id="'.$id.'" type="'.$field['type'].'" name="'.$id.'" value="'.$customid.'" size="'.$field['size'].'" style="max-width:100%"/><br>';
                        break;
                    case"textarea":
                    if(isset($custom[$id][0])){
                        $customid = $custom[$id][0];
                    }else{
                        $customid = '';
                    }
                    $output .= '<label for="'.$id.'">'.$field['title'].'</label><br><br><textarea id="'.$id.'" class="widefat" rows="4" type="'.$field['type'].'" name="'.$id.'" style="max-width:100%"/>'.$customid.'</textarea>';
                        break;
                    case"checkbox":
                    if(isset($custom[$id][0])){
                        $customid = 'checked';
                    }else{
                        $customid = '';
                    }
                    $output .= '<br><input id="'.$id.'" type="'.$field['type'].'" name="'.$id.'" '.$customid.'/><label for="'.$id.'">'.$field['title'].'</label>';
                        break;
                }
            }
        } 
        echo $output;
    }
     
    function phase_save_metaboxes($post_id){
        global $metaboxes;
        if(isset($_POST['post_format_meta_box_nonce'])){
            $post_format_meta_box_nonce = $_POST['post_format_meta_box_nonce'];
        }else{
            $post_format_meta_box_nonce = '';
        }
        if(!wp_verify_nonce($post_format_meta_box_nonce,basename(__FILE__ ))){
            return $post_id;
        }
        if(defined('DOING_AUTOSAVE')&&DOING_AUTOSAVE){
            return $post_id;
        }
        if('page' == $_POST['post_type']){
        	if(!current_user_can('edit_page',$post_id)){
        		return $post_id;
            }
        }elseif(!current_user_can('edit_post',$post_id)){
        	return $post_id;
        }
        $post_type = get_post_type();
        foreach($metaboxes as $id => $metabox){
            if($metabox['applicableto'] == $post_type){
                $fields = $metaboxes[$id]['fields'];
                foreach($fields as $id => $field){
        			$old = get_post_meta($post_id,$id,true);
        			$new = $_POST[$id];
                    if($new&&$new!=$old){
        				update_post_meta($post_id,$id,$new);
        				}
        			elseif('' == $new&&$old||!isset($_POST[$id])){
        				delete_post_meta($post_id,$id,$old);
    				}
    			}
    		}
    	}
    }
    add_action('save_post','phase_save_metaboxes');

    function phase_display_metaboxes(){
        global $metaboxes;
        if(get_post_type() == "post"){
                                    ?>
            <script type="text/javascript">
                $ = jQuery;
                <?php
                $formats = $ids = array();
                foreach($metaboxes as $id => $metabox){
                    array_push($formats,"'".$metabox['display_condition']."': '".$id ."'");
                    array_push($ids,"#".$id);
                    }
                    ?>
     
                var formats = {<?php echo implode(',',$formats);?>};
                var ids = "<?php echo implode( ',', $ids ); ?>";
                function displayMetaboxes(){
                    $(ids).hide();
                    var selectedElt = $("input[name='post_format']:checked").attr("id");
                    if(formats[selectedElt])
                    $("#"+formats[selectedElt]).fadeIn("fast");
                }
     
                $(function(){
                    displayMetaboxes();
                    $("input[name='post_format']").change(function(){displayMetaboxes();
                    });
                });
            </script>
        <?php
        }
    }
    add_action('admin_print_scripts','phase_display_metaboxes',600);
?>