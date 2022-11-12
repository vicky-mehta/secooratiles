jQuery( document ).ready(function( $ ) {
// Code using $ as usual goes here.
		/* pagination */
	$('ul.page-numbers').addClass('pagination');
	$('.page-numbers > li > a, .page-numbers > li > span').removeClass('pagination');
	$('.page-numbers.current').parent('li').addClass('active');	

	/* serach form js for 404.php */
	$('.error404 .search-form, .search-no-results .search-form').addClass('form-horizontal');
	$('.error404 .search-form .search-field, .search-no-results .search-form .search-field').unwrap();
	$('.error404 .search-form, .search-no-results .search-form').wrapInner('<div class="form-group">');
	$('.error404 .screen-reader-text, .search-no-results .screen-reader-text').wrap('<label class="col-md-2 control-label">');
	$('.error404 .screen-reader-text, .search-no-results .screen-reader-text').contents().unwrap();
	$('.error404 .search-field, .search-no-results .search-field').wrap('<div class="col-md-4"></div>');
	$('.error404 .search-field, .search-no-results .search-field').addClass('form-control');
	$('.error404 .search-form .search-submit, .search-no-results .search-form .search-submit').wrap('<div class="col-md-6"></div>');
	$('.error404 .search-form .search-submit, .search-no-results .search-form .search-submit').addClass('btn btn-warning');
	
	/* search widget styles */
	
	$('.widget_search .search-form').removeClass('form-horizontal');
	$('.widget_search .search-form .search-field').unwrap();
	$('.widget_search .search-form').wrapInner('<div class="input-group">');
	$('.widget_search .search-form .screen-reader-text').hide();
	$('.widget_search .search-field').addClass('form-control');
	$('.widget_search .search-form .search-submit').addClass('btn btn-warning');
	$('.widget_search .search-form .search-submit').wrap('<span class="input-group-btn">');

	
	//$('.bs-search .bs-search')
	$('.bs-search .search-form .search-field').unwrap();
	$('.bs-search .search-form').wrapInner('<div class="input-group">');
	$('.bs-search .search-field').addClass('form-control');
	$('.bs-search .search-form .search-submit').wrap('<span class="input-group-btn"></span>');
	
	$(".bs-search .search-submit").click(function() {
		$(".search-form").submit();
	});	// JavaScript Document
	$('.show-s-form').click(function(){
		$('.search-form-m').toggle();
	
	});
	
	$('.widget_recent_entries .post-date').prepend('<i class="glyphicon glyphicon-time"></i> ');
		/* make wordpress drop down code compatible with boostrap */
	$('.nav > .menu-item-has-children').addClass('dropdown');
	$('.nav > .menu-item-has-children > a').append(' <span class="caret"></span>')
	$('.nav > .menu-item-has-children > a').addClass('dropdown-toggle').attr({'data-toggle':"dropdown", 'data-hover':"dropdown"});
	$('.nav > .menu-item-has-children > ul').addClass('dropdown-menu');
	$('.bs-sublink > ul > .current_page_item > a').addClass('active');


	
	$(window).load(function() {
		if(($(window).width())>991 && ($(window).width())<1200) {
			 equalheight('.equalheight');
		}
		
		$('.dropdown').hover(function(){ 
		  //$('.dropdown-toggle', this).trigger('click'); 
		});
		equalheight('#owl-example .owl-item > div');
		equalheight('#owl-example2 .owl-item > div');
		
	 
	});
		
	$(window).load(function() {
		/*
		$('#slider').nivoSlider({
			directionNav: false,
			controlNav: false	
		});
		*/
	});		
		
	$('p').each(function() {
		var $this = $(this);
		if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
			$this.remove();
	});
		
	$('a[href$=".jpg"], a[href$=".jpeg"], a[href$=".gif"], a[href$=".png"]').click(function(){
			$('.modal-body').empty();
			var title = $(this).attr('title');
			$('.modal-title').html(title);
			var content='<img class="img-responsive" src="'+$(this).attr('href')+'" />';
			$('.modal-body').html(content);
			//$($(this).parents('div').html()).appendTo('.modal-body');
			$('#myModal').modal({show:true});
			return false;
		
	});

	/* wordpress [gallery] shortcode responsive */
	if($('.gallery').length>0) {
		$('.gallery.gallery-columns-3').addClass('row');
		if($('.gallery-columns-3').length>0) {
			$(this).find('.gallery-item').addClass('col-sm-6 col-md-4');
			$(this).find('img').addClass('img-responsive');
		}
		if($('.gallery-columns-2').length>0) {
			$(this).find('.gallery-item').addClass('col-sm-6 col-md-6');
			$(this).find('img').addClass('img-responsive');
		}		
		if($('.gallery-columns-4').length>0) {
			$(this).find('.gallery-item').addClass('col-sm-6 col-md-3');
			$(this).find('img').addClass('img-responsive');
		}		
	}

	
	$('.wpcf7-form-control').addClass('form-control');
	$('.wpcf7-submit').addClass('btn btn-success');
	$('.single_add_to_cart_button').removeClass('button').addClass('btn btn-success');
	$('.wpcf7-not-valid-tip').detach();
	
	if($("#owl-example").length>0) {
	  $("#owl-example").owlCarousel({
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
		  items : 6,
		  itemsDesktop : [1200,6],
		  itemsDesktopSmall : [992,5],
		  itemsTablet:[768,4]
	  });		
	}
	if("#owl-example2").length>0) {
	  $("#owl-example2").owlCarousel({
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
		  items : 3,
		  itemsDesktop : [1200,3],
		  itemsDesktopSmall : [992,3],
		  itemsTablet:[768,3]
	  });			
		
	}


  
	  	
		


});

equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

// ===== Hamburger JS Start==== 
    var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }
// ===== Hamburger JS Ends==== 