jQuery(document).ready(function($){

	$("input,textarea").focus(function(){
		$(this).siblings("label").fadeOut(200)
	}).blur(function(){
		if(!$(this).val()){
			$(this).siblings("label").fadeIn(200)
    	}
	});

   $("input,textarea").each(function(){
   		if($(this).val().length > 0){
   			$("label[for='"+$(this).attr("id")+"']").hide();
   		}
	});

	/*  Animation  */

	$(window).load(function(){
		$("body").addClass("loaded")
	})

    if($("body").hasClass("animated_page_transition")){
	    $("a").click(function(event){
			var comp = new RegExp(location.host);
	    	if(comp.test($(this).attr('href'))){
		        event.preventDefault();
				linkLocation = this.href;
				$("body").removeClass("sidebar_slide");
				$("body").addClass("animated_leaving");
		        setTimeout(function(){
		            window.location = linkLocation;
		        },450)
		    }
	    });
	}

	/*  Widget  */

	$(".widget ul.menu li.menu-item-has-children > a,#sidebar #slide #navigation li.menu-item-has-children > a").click(function(){
        event.preventDefault();
		$(this).parent().siblings("li.menu-item-has-children").children("ul").slideUp("fast");
		$(this).parent().siblings("li.menu-item-has-children").children("a").removeClass("open");
		$(this).siblings("ul").slideToggle("fast")
		$(this).toggleClass("open")
	});

	/*  Sidebar  */

	function sidebar_menu_calculation(){
		$sidebar_menu_height = $("#sidebar #menu").outerHeight();
		$sidebar_blog_title_width = $("#sidebar #menu a#blog-title").outerWidth();
		$sidebar_social_height = $("#sidebar #menu #social").outerHeight();
		$sidebar_h1_width = $sidebar_blog_title_width+30;
		$sidebar_tag_line_width = $sidebar_menu_height-$sidebar_blog_title_width-$sidebar_social_height-76.5;
		$sidebar_tag_line_text_width = $("#sidebar #tag-line span").outerWidth();
		$("#sidebar #menu h1").css({
			"width":$sidebar_blog_title_width+"px",
			"margin-top":$sidebar_blog_title_width+30+"px"
		});
		$("#sidebar #menu #tag-line").css({
			"width":$sidebar_tag_line_width+"px",
			"margin-top":$sidebar_tag_line_width-30+"px"
		});
		if($sidebar_tag_line_text_width > $sidebar_tag_line_width){
			$("#sidebar #menu").addClass("tag_line_exceed");
		}
		$("#sidebar #menu").css("opacity",1);
	}

	if($(window).width() > 480){
		sidebar_menu_calculation();
	}else{
		$("#sidebar #menu").css("opacity",1);
	}

	$(window).resize(function(){
		if($(window).width() > 480){
			sidebar_menu_calculation()
		}else{
			$("#sidebar #menu").css("opacity",1);
		}
	});

	$("#sidebar #menu").on("click",function(){
		$("body").addClass("sidebar_slide");
		$("#sidebar #slide").scrollTop(0);
		var scrollPosition = [self.pageXOffset||document.documentElement.scrollLeft||document.body.scrollLeft,self.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop];
		var html = jQuery("html");
		html.data("scroll-position",scrollPosition);
		html.data("previous-overflow",html.css("overflow"));
		html.css("overflow","hidden");
		window.scrollTo(scrollPosition[0],scrollPosition[1]);
	});

	$("#sidebar ul#social").click(function(e){
		e.stopPropagation();
	});

    $(document).mouseup(function(e){
        var i = $("#sidebar");i.is(e.target)||0!==i.has(e.target).length||$("body").removeClass("sidebar_slide");
		var html = jQuery("html");
		html.css("overflow",html.data("previous-overflow"));
    });

	$("#sidebar a#sidebar_slide_close").on("click",function(){
        $("body").removeClass("sidebar_slide");
		var html = jQuery("html");
		html.css("overflow",html.data("previous-overflow"));
	});

	/*  Container  */

	$window_height = $(window).height();
	$pagination_height = $("#pagination").innerHeight();

	$("#posts").css({
		"min-height":$window_height-$pagination_height+"px"
	})

	function scroll_top_button(){
		$scroll_top_button = $("a#scroll-top");
		if($(window).scrollTop() > 300){
			$scroll_top_button.addClass("show")
		}else{
			$scroll_top_button.removeClass("show")
		}
		$scroll_top_button.mouseover(function(){
			$(this).css({"width":$("a#scroll-top span").outerWidth()+50+"px"})
		}).mouseout(function(){
			$(this).css({"width":40+"px"})
		});
	}

	scroll_top_button()

	$(window).scroll(function(){
		scroll_top_button()
	})

	$scroll_top_button.click(function(e){ 
	    e.preventDefault(); 
	    $('html,body').animate({
	    	scrollTop:$("body").offset().top
	    });
	});

	$("#filter a#filter_slide").click(function(){
		$("#filter").toggleClass("active");
		$filter_slide_width = $(this).innerWidth();
		$("#filter ol#filters").css({"right":$filter_slide_width+"px"})
		$("#filter.active a#filter_slide").click(function(){
			$("#filter ol#filters li.all").addClass("active").siblings("li").removeClass("active");
			$("#styles_filter").remove()
		})
	})

	$("#filters").on("click","a",function(){
		$filter_value = $(this).attr("data-filter");
		$(this).parent().siblings("li").removeClass("active");
		$(this).parent("li").addClass("active");
		$("#styles_filter").remove();
		$("#container").append("<div id='styles_filter'><style type='text/css'>article{pointer-events:none}article .filter{opacity:.3}article."+$filter_value+"{pointer-events:auto}article."+$filter_value+" .filter{opacity:1}</style></div>")
	});

	function article_format(){
		$("article.blog.index .box").mouseover(function(){
			$format = $(this).children().children(".format");
			$format.css({"width":$format.children("span").outerWidth()+52+"px"})
		}).mouseout(function(){
			$format.css({"width":35+"px"})
		});
	}

	article_format();

	function grid_full(container){
		$window_width = $(window).width();
		if($window_width <= 600){
			$grid_items_width = Math.floor(container.width());
		}else if($window_width <= 900){
			$grid_items_width = Math.floor(container.width()/2);
		}else if($window_width <= 1200){
			$grid_items_width = Math.floor(container.width()/3);
		}else if($window_width <= 1500){
			$grid_items_width = Math.floor(container.width()/4);
		}else{
			$grid_items_width = Math.floor(container.width()/5)
		}
		return $grid_items_width;
	}

	function grid_padded(container){
		$window_width = $(window).width();
		if($window_width <= 600){
			$grid_items_width = Math.floor(container.width());
		}else if($window_width <= 1000){
			$grid_items_width = Math.floor(container.width()/2);
		}else if($window_width <= 1500){
			$grid_items_width = Math.floor(container.width()/3);
		}else if($window_width <= 2000){
			$grid_items_width = Math.floor(container.width()/4);
		}else{
			$grid_items_width = Math.floor(container.width()/5)
		}
		return $grid_items_width;
	}

	function no_more_posts(){
		$("a#load").addClass("finished").removeClass("loading");
		$("#load span#more").remove();
		$("#load span#done").delay(300).fadeIn();
	}

	$container = $("#container");
	$grid = $container.children("#posts");
	$posts = $grid.children("article");

	if($container.hasClass("grid") || $("#portfolio-more").length){
		if($("#portfolio-more").length){
			$container = $("#portfolio-more").children(".grid");
			$grid = $("#portfolio-more").children(".grid");
			$posts = $grid.children("article")
		}
		if($container.hasClass("grid-full")){
			$column_size = grid_full($grid)
		}else if($container.hasClass("grid-padded")){
			$column_size = grid_padded($grid)
		}
		$container.append("<div id='styles_grid'><style type='text/css'>article{width:"+$column_size+"px}</style></div>")
		$grid.imagesLoaded(function(){
			$grid.isotope({
		 		resizesContainer:true,
		 		transitionDuration:0,
	            masonry:{
	                columnWidth:$column_size,
	                isFitWidth:true
	            }
			});
			$grid.addClass("css_fadein")
		});
		$(window).resize(function(){
			if($container.hasClass("grid-full")){
				$column_size = grid_full($grid)
			}else if($container.hasClass("grid-padded")){
				$column_size = grid_padded($grid)
			}
			$grid.isotope({
	            masonry:{
	                columnWidth:$column_size
	            }
			});
			$("#styles_grid").remove()
			$container.append("<div id='styles_grid'><style type='text/css'>article{width:"+$column_size+"px}</style></div>")
		});
	}

	$("a#load").click(function(){
		$("#posts").infinitescroll('retrieve');
		$("a#load").addClass("loading").removeClass("loaded")
	});

	$grid.infinitescroll({
		errorCallback:function(){
			no_more_posts()
		}
	},function(newElements){
		var $newElems = $(newElements).addClass("loading");
		$grid.imagesLoaded(function(){
			article_format();
			$grid.isotope('insert',$newElems);
			$(newElements).addClass("loaded").removeClass("loading");
			setTimeout(function(){
				$("a#load").addClass("loaded").removeClass("loading")
			},300);
		});
	});

	$(window).unbind('.infscr');

	/*  Single Articles  */

	function scroll_percentage(){
		var scroll_percentage = 100*$(this).scrollTop()/($("#featured").height()+$("#content").height()-$window_height/2);
		if(scroll_percentage < 100){
			$("#progress-bar span").css("width",scroll_percentage.toFixed(2)+"%")
		}else{
			$("#progress-bar span").css("width",100+"%")
		}
	}

	scroll_percentage();

	$(window).scroll(function(){
		scroll_percentage()
	})

	$("p").each(function(){
	    var $parargaph = $(this),
	        $text = $parargaph.html();
	    if($text=='&nbsp;'){
	        $parargaph.remove()
	    }
	});

	$("article.single").imagesLoaded(function(){
		$("article.single .slider").slick({
			dots:true,
			speed:500,
			slidesToShow:1,
	  		adaptiveHeight:true,
			focusOnSelect:true,
			prevArrow:"<button type='button' class='slick-prev'><i class='icon-left-open'></i></button>",
			nextArrow:"<button type='button' class='slick-next'><i class='icon-right-open'></i></button>",
			autoplay:true,
	  		autoplaySpeed:4000,
		}).addClass("loaded");
		$posts_height = $("#posts").outerHeight();
		$("#single-sidebar").css({
			"min-height":$posts_height+"px"
		})
	})

	$("article").fitVids();

	function portfolio_more(event){
        event.preventDefault();
		$("#portfolio-more a#grid_slide").slideUp();
		setTimeout(function(){
			$("#portfolio-more").addClass("slide");
    	$("html,body").animate({
        	scrollTop:$("#portfolio-more").offset().top},300);
		},600)
	}
	$("a#grid_slide").click(portfolio_more);

	$("#single-sidebar a#single-sidebar_slide").click(function(){
        event.preventDefault();
		$("body").toggleClass("single-sidebar_slide")
	});

/*  End Jquery  */
});