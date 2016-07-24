<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label for="search"><?php _e('Search','liquid');?></label>
	<input type="search" id="search" class="search-field" value="<?php echo get_search_query()?>" name="s" title="<?php echo esc_attr_x('Search for:','label','liquid')?>" autocomplete="off"/>
	<input type="submit" class="search-submit" value="&#xe803"/>
</form>