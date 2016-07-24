<?php
	$portfolio_filter_01 = esc_attr(get_theme_mod('portfolio_filter_01'));
	$portfolio_filter_02 = esc_attr(get_theme_mod('portfolio_filter_02'));
	$portfolio_filter_03 = esc_attr(get_theme_mod('portfolio_filter_03'));
	$portfolio_filter_04 = esc_attr(get_theme_mod('portfolio_filter_04'));
	$portfolio_filter_05 = esc_attr(get_theme_mod('portfolio_filter_05'));
	$portfolio_filter_06 = esc_attr(get_theme_mod('portfolio_filter_06'));
	$portfolio_filter_07 = esc_attr(get_theme_mod('portfolio_filter_07'));
	$portfolio_filter_08 = esc_attr(get_theme_mod('portfolio_filter_08'));
	$portfolio_filter_09 = esc_attr(get_theme_mod('portfolio_filter_09'));
	$portfolio_filter_10 = esc_attr(get_theme_mod('portfolio_filter_10'));
	$portfolio_filters = array($portfolio_filter_01,$portfolio_filter_02,$portfolio_filter_03,$portfolio_filter_04,$portfolio_filter_05,$portfolio_filter_06,$portfolio_filter_07,$portfolio_filter_08,$portfolio_filter_09,$portfolio_filter_10);
	$portfolio_filters = array_filter($portfolio_filters);
	if(!empty($portfolio_filters)){
		echo '<div id="filter"><ol id="filters"><li class="all active"><a href="#" onclick="return false" data-filter="portfolio">All</a></li>';
		foreach($portfolio_filters as $portfolio_filter){
			if(!empty($portfolio_filter)){
				$portfolio_filter_value = strtolower(str_replace(' ','-',$portfolio_filter));
				echo '<li><a href="#" onclick="return false" data-filter="portfolio_category-'.$portfolio_filter_value.'">'.$portfolio_filter.'</a>';
			}
		}
		echo '</ol><a href="#" onclick="return false" id="filter_slide"><i class="icon-menu"></i><i class="icon-cancel"></i>Filter</a></div>';
	}
?>