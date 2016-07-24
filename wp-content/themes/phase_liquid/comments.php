<?php
	$disqus_username = get_theme_mod('disqus_username');
	if(post_password_required()){
		return;
	}
	wp_enqueue_script('comment-reply');
	if(comments_open()){
		if(have_comments()){
			$comment = 'has-comments';
		}
?>
	<div id="comments" class="<?php echo $comment;?>">
	<?php 
		if(!$disqus_username){
			if(have_comments()){
				?>
				<h3><?php comments_number('0 Comments','One Comment','% Comments');?></h3>
				<ol class="comment-list">
					<?php
						wp_list_comments( array(
							'callback' => 'phase_comments',
							'style' => 'ol',
							'short_ping' => true,
							'avatar_size' => 40,
						));
					?>
				</ol>
			<?php if(get_comment_pages_count()>1&& get_option('page_comments')){?>
					<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
					<hr class="divider">
						<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments'.'liquid'));?></div><div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;'.'liquid'));?></div>
					</nav>
			<?php 
				}
			}

			$commenter = wp_get_current_commenter();
			$req = get_option('require_name_email');
			$aria_req = ($req ?" aria-required='true'":'');
			$required_text = ' *';

			$fields = array(
				'author' => '<p class="comment-form-author"><label for="author">'.__('Name','liquid' ).' '.($req?$required_text:'').'</label>'.'<input id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30"'.$aria_req.'/></p>',
				'email' => '<p class="comment-form-email"><label for="email">'.__('Email','liquid').' '.($req?$required_text:'').'</label>'.'<input id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).'" size="30"'.$aria_req.' /></p>',
				'url' => '<p class="comment-form-url"><label for="url">'.__('Website (optional)','liquid').'</label>'.'<input id="url" name="url" type="text" value="'.esc_attr( $commenter['comment_author_url']).'" size="30" /></p>',
			);

			$comments_args = array(
				'title_reply'=>'Leave a comment',
				'title_reply_to'=>'Leave a reply to %s &#183; ',
				'cancel_reply_link'=>'Cancel',
				'comment_notes_before'=>'',
				'comment_notes_after' =>'',
				'comment_field'=>'<p class="comment-form-comment"><label for="comment">'.esc_html__('Leave a Comment Here','liquid').'</label><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
				'fields'=>apply_filters('comment_form_default_fields',$fields),
				'label_submit'=>'Submit Comment'
				);
			comment_form($comments_args);
		}else{
			?>
			<script type="text/javascript">var disqus_url="<?php the_permalink();?>";var disqus_title="<?php the_title();?>";</script><div id="disqus_thread"></div><script type="text/javascript">var disqus_identifier=<?php the_ID();?>;(function(){var dsq=document.createElement('script');dsq.type='text/javascript';dsq.async=true;dsq.src='http://<?php echo $disqus_username;?>.disqus.com/embed.js';(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);})();</script><noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript=<?php echo $disqus_username;?>">comments powered by Disqus.</a></noscript>
		<?php }?>
	</div>
<?php }?>