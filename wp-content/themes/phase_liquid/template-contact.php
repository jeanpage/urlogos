<?php 
	/*  Template Name: Contact Page  */
    get_header();
    $contact_email_address = is_email(get_theme_mod('contact_email_address',false));
    $contact_map_embed_code = esc_attr(get_theme_mod('contact_map_embed_code',false));
    if(is_active_sidebar('single_sidebar')){
        $sidebar = 'has-sidebar';
    }else{
        $sidebar = '';
    }
    $container_classes = 'single '.$sidebar;
    $article_classes = array('single','contact');

    $response = "";

    function my_contact_form_generate_response($type, $message){
        global $response;
        if($type == "success"){
            $response = "<div class='success'>{$message}</div>";
        }else{
            $response = "<div class='error'>{$message}</div>";
        }
    }

    $not_human = "Human verification incorrect.";
    $missing_content = "Please supply all information.";
    $email_invalid = "Email Address Invalid.";
    $message_unsent = "Message was not sent. Try Again.";
    $message_sent = "Thanks! Your message has been sent.";
    if(isset($_POST['message_name'])){
        $name = $_POST['message_name'];
    }
    if(isset($_POST['message_email'])){
        $email = $_POST['message_email'];
    }else{
        $email = '';
    }
    if(isset($_POST['message_text'])){
        $message = $_POST['message_text'];
    }
    if(isset($_POST['message_human'])){
        $human = $_POST['message_human'];
    }else{
        $human = '';
    }
    if($contact_email_address){
        $to = $contact_email_address;
    }else{
        if(get_option('admin_email')){
            $to = get_option('admin_email');
        }
    }

    $subject = 'Message from '.$name.' | '.get_bloginfo('name');
    $headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n";

    if(isset($_POST['submitted'])){
        if($human==""){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                my_contact_form_generate_response("error", $email_invalid);
            }else{
                if(empty($name) || empty($message)){
                  my_contact_form_generate_response("error", $missing_content);
                }else{
                    $sent = wp_mail($to,$subject,strip_tags($message), $headers);
                    if($sent){
                        my_contact_form_generate_response("success", $message_sent);
                    }else{
                        my_contact_form_generate_response("error", $message_unsent);
                    }
                }
            }
        }
        else if($_POST['submitted']){
            my_contact_form_generate_response("error", $missing_content);
        }
    }

?>

<div id="container" class="<?php echo $container_classes;?>">

	<div id="posts">

        <article id="post-<?php the_ID();?>" <?php post_class($article_classes);?>>
			<?php 
                if(have_posts()){
                    if(!empty($response)){
                        echo '<div id="respond">'.$response.'</div>';
                    }
                    while(have_posts()):the_post();
                        if(has_post_thumbnail()){
                            echo '<div id="featured">';
                                the_post_thumbnail();
                            echo '</div>';
                        }
                        echo '<div id="content"><h1>'.get_the_title().'</h1>';
                        the_content();
                    endwhile;
                }
            ?>
    			<form id="contactform" action="<?php the_permalink();?>" method="post">
                    <p class="contact-form-name">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="message_name">
                    </p>
                    <p class="contact-form-email">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="message_email">
                    </p>
                    <p class="contact-form-message">
                        <label for="your-message">Your Message</label>
    				    <textarea id="your-message" type="text" name="message_text"></textarea>
                    </p>
                    <p class="contact-form-submit">
    				    <input type="hidden" name="submitted" value="1">
                        <input id="submit" type="submit">
                    </p>
    			</form>
            </div>
        </article>

	</div>

    <?php get_sidebar('single');?>

</div>

<?php get_footer();?>