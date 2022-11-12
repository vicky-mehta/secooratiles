jQuery( document ).ready(function( $ ) {
// Code using $ as usual goes here.
		/* pagination */
	$('ul.page-numbers').addClass('pagination justify-content-center');
	$('ul.page-numbers > li').addClass('page-item');
	$('ul.page-numbers > li > a').addClass('page-link');
	$('ul.page-numbers > li > span').addClass('page-link');
	//$('.page-numbers > li > a, .page-numbers > li > span').removeClass('pagination');
	$('.page-numbers.current').parent('li').addClass('active');	

	/* serach form js for 404.php */
	
	$('.error404 .search-form, .search-no-results .search-form').addClass('form');
	$('.error404 .search-form .search-field, .search-no-results .search-form .search-field').unwrap();
	$('.error404 .search-form, .search-no-results .search-form').wrapInner('<div class="form-group row">');
	$('.error404 .screen-reader-text, .search-no-results .screen-reader-text').wrap('<label class="col-md-2 col-form-label text-right">');
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
		
	/*	
	$('.nav > .menu-item-has-children').addClass('dropdown');
	$('.nav > .menu-item-has-children > a').append(' <span class="caret"></span>')
	$('.nav > .menu-item-has-children > a').addClass('dropdown-toggle').attr({'data-toggle':"dropdown", 'data-hover':"dropdown"});
	$('.nav > .menu-item-has-children > ul').addClass('dropdown-menu');
	$('.bs-sublink > ul > .current_page_item > a').addClass('active');
	*/


	
	$(window).load(function() {
		if(($(window).width())>991 && ($(window).width())<1200) {
			 //equalheight('.equalheight');
		}
		//equalheight('#owl-example .owl-item > div');
		//equalheight('#owl-example2 .owl-item > div');
		$('.spinner').hide();
		wow = new WOW(
			{
			  boxClass:     'wow',      // default
			  animateClass: 'animated', // default
			  offset:       250,          // default
			  mobile:       true,       // default
			  live:         true        // default
			}
			)
			wow.init();		
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
	
	$('a[href$=".jpg"], a[href$=".jpeg"], a[href$=".gif"], a[href$=".png"]').addClass('venobox');
	$('a[href$=".jpg"], a[href$=".jpeg"], a[href$=".gif"], a[href$=".png"]').click(function(){
		
			/*
			$('.modal-body').empty();
			var title = $(this).attr('title');
			$('.modal-title').html(title);
			var content='<img class="img-fluid" src="'+$(this).attr('href')+'" />';
			$('.modal-body').html(content);
			//$($(this).parents('div').html()).appendTo('.modal-body');
			$('#myModal').modal({show:true});
			return false;
			*/
		
	});

	/* wordpress [gallery] shortcode responsive */
	if($('.gallery').length>0) {
		$('.gallery.gallery-columns-3').addClass('row');
		$('.gallery.gallery-columns-4').addClass('row');
		$('.gallery.gallery-columns-2').addClass('row');
		if($('.gallery-columns-3').length>0) {
			$(this).find('.gallery-item').addClass('col-sm-6 col-md-4');
			$(this).find('img').addClass('img-fluid');
		}
		if($('.gallery-columns-2').length>0) {
			$(this).find('.gallery-item').addClass('col-sm-6 col-md-6');
			$(this).find('img').addClass('img-fluid');
		}		
		if($('.gallery-columns-4').length>0) {
			$(this).find('.gallery-item').addClass('col-sm-6 col-md-3');
			$(this).find('img').addClass('img-fluid');
		}		
	}

	
	$('.wpcf7-text, .wpcf7-textarea').addClass('form-control');
	//$('.wpcf7-submit').addClass('btn btn-success');
	$('.single_add_to_cart_button').removeClass('button').addClass('btn btn-success');
	$('.wpcf7-not-valid-tip').detach();
	
	if($(".bs_travel_caurosel_in").length>0) {
	  var owl = $('.bs_travel_caurosel_in');
		  owl.owlCarousel({
			  responsive: {
			  0: {
				items: 1
			  },
			  768: {
				items: 2
			  },
			  992: {
				items: 3
			  },
			  1200: {
				items: 4
			  }
			},
			nav: true,
			autoplay: false,
			items: 4,
			margin:30,
			loop: true,
			 navText: [
			  "",
			  ""
			  ]     
		  });
	}
	if($('.venobox').length>0) {
		$('.venobox').venobox({
			titlePosition:'bottom'
		}); 
	}
	if($('.scrollbar-outer').length>0) {
		jQuery('.scrollbar-outer').scrollbar({
			/*"autoScrollSize": false,*/
			"ignoreMobile":true,
			"ignoreOverlay":true,
		});
	}
	
	/* one page navigation */
	$('.home #main-nav .navbar-nav > li:nth-child(2) > a').on('click',function (e) {
	    e.preventDefault();
		var target = '#profile';
		onpagescroll(target);
	});	
	$('.home #main-nav .navbar-nav > li:nth-child(3) > a, .home #main-nav .prd-range > li:nth-child(1) > a').on('click',function (e) {
	    e.preventDefault();
		var target = '#product';
		onpagescroll(target);
	});			
	$('.home #main-nav .navbar-nav > li:nth-child(4) > a').on('click',function (e) {
	    //e.preventDefault();
		//var target = '#product';
		//onpagescroll(target);
	});
	$('.home #main-nav .navbar-nav > li:nth-child(5) > a').on('click',function (e) {
	    e.preventDefault();
		var target = '#export';
		onpagescroll(target);
	});	
	$('.home #main-nav .navbar-nav > li:nth-child(6) > a').on('click',function (e) {
	   // e.preventDefault();
		//var target = '#export';
		//onpagescroll(target);
	});	
	$('.home #main-nav .navbar-nav > li:nth-child(7) > a').on('click',function (e) {
	   	e.preventDefault();
		var target = '#contact';
		onpagescroll(target);
	});	
	
//
	function onclickLink(event, this1){
		if (document.cookie.indexOf("allowDownload")<0) {
			event.preventDefault();
			$('#myModal3').modal({show:true});
			/* do whatever you want with link*/
			//$.cookie("link_disabled", 1, { expires : 5 });/*setting the cookie for 5 days*/
		}
		else{
			//event.preventDefault();
		} 
	}
    $(document).on('click', 'a[href$=".pdf"]',function(e) {
		//alert();
		//e.preventDefault();
        //onclickLink(e,$(this));
    });
    
	
	function onpagescroll(target) {
	    $target = $(target);
		var offset=Math.floor($target.offset().top);
		//alert(offset);
	    $('html, body').stop().animate({
	        'scrollTop': offset
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });		
	}
	
	if($("#owl-example2").length>0) {
		  $("#owl-example2").owlCarousel({
			  autoPlay: 3000, //Set AutoPlay to 3 seconds
			  items : 3,
			  itemsDesktop : [1200,3],
			  itemsDesktopSmall : [992,3],
			  itemsTablet:[768,3]
		  });
	}	

	if ($('#back-to-top').length) {
		var scrollTrigger = 100, // px
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$('#back-to-top').addClass('show');
				} else {
					$('#back-to-top').removeClass('show');
				}
			};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('#back-to-top').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}	


	//<!--ajax post-->
		//more_post_ajax define in function.php file */
		var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
			bottomOffset = 800; // the distance (in px) from the page bottom when you want to load more posts
	 
		$('#loader_ic').hide();
		var $loader = $('.loader_msg');
		
		var ppp = 4; // Post per page
		if($('.loader_msg').length)
		var $loader = $('.loader_msg');
		var pageNumber = 1;

 		var scrollHandling = {
		    allow: true,
		    reallow: function() {
		        scrollHandling.allow = true;
		    },
		    delay: 400 //(milliseconds) adjust to the highest acceptable value
		};
		
		function load_posts(pageid,pgno){
			//pgno;
			//alert(pageid);
			//pageNumber++;
			var str = '' + '&pageNumber=' + ajax_posts.current_page + '&ppp=' + ppp + '&action=more_post_ajax' + '&current_page=' + pgno + '&pageid=' + pageid;
			if( scrollHandling.allow && canBeLoaded ) {
				scrollHandling.allow = false;
				setTimeout(scrollHandling.reallow, scrollHandling.delay);
				//console.log("canBeLoaded = "+((($(window).scrollTop() + $(window).height() + 260) > $(document).height()) && canBeLoaded == true) );
				//var offset1 = $('#position_1').offset().top - $(window).scrollTop();
				//console.log(offset1);
				//if( 2000 > offset1 ) {
					canBeLoaded = true; 
					$.ajax({
						type: "POST",
						dataType: "html",
						url: ajax_posts.ajaxurl_bs1,
						data: str,
						beforeSend: function( xhr ){
							// you can also add your own preloader here
							// you see, the AJAX call is in process, we shouldn't run it again until complete
							$('#loader_ic').show();
							canBeLoaded = false; 
						},				
						success: function(data){
							var $data = $(data);
							if($data.length){
								//$("#ajax-posts").append($data);
								//$("#more_posts").removeAttr("disabled");
								//$("#more_posts .fa").remove();
								$('.ajax_tiles_loader').html($data);
								var offset=Math.floor(($('.ajax_tiles_loader').offset().top)-70);
								//console.log(offset);
								
								$('html,body').animate({
									scrollTop: offset
								}, 700);
								
								
								canBeLoaded = true; // the ajax is completed, now we can run it again
								ajax_posts.current_page=pgno; //Number(ajax_posts.current_page)+1;
								
								$('#loader_ic').hide();						
							} else{
								$loader.html('<p class="text-center pb-5 say-hello">No More Post</p>');
								$('#loader_ic').hide();
							}
						},
						error : function(jqXHR, textStatus, errorThrown) {
							canBeLoaded = false;
							$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
							$('#loader_ic').hide();
						}
				
					});
					
				//}

			//return false;
			
			}

		}
		
		var pageid;
		var pageno;
		$(".more_posts").on("click",function(e){ // When btn is pressed.
			//$("#more_posts").attr("disabled",true); // Disable the button, temp.
			e.preventDefault();
			//$("#more_posts").append('<i class="fa fa-spinner fa-spin" style="margin-left:10px;"></i>');
			pageid=$(this).data('pageid');
			//console.log(pageid);
			if (document.cookie.indexOf("allowDownload")<0) {
					$('#myModal3').modal({show:true});
			} else {
				load_posts(pageid,1);
			}		
			
			
			
		});
		

		$(document).on('click', '.ajax_tiles_loader .bs-pagination ul > li > a', function(e) {
			//alert(pageid);
			//alert("new link clicked!"+e.target.nodeName);
			//console.log($(this));
			//$(this).venobox().trigger('click');
			//pageno=$(this).
			e.preventDefault();
			var url=$(this).attr('href');
			//var clickid=$(this).parent('li').index();
			var navpageid = getUrlVars(url)["paged"];
			if(navpageid==undefined)
				navpageid = getUrlVars(url)["gallery_page"]; 
			//var hashes = url.slice(url.indexOf('?') + 1).split('&');
			console.log(navpageid);
			if(navpageid==undefined)
				navpageid=1;
			load_posts(pageid,navpageid);
			
		});		
		
		$(document).on('click', '.venobox', function(e) { 
			//alert("new link clicked!"+e.target.nodeName);
			//console.log($(this));
			$(this).venobox().trigger('click');
			e.preventDefault();
			
		});

		/* other page ajax */
		$.ajaxSetup({cache:false});
		var scriptpath="";
		if($(location).attr('host')=="localhost") {
			scriptpath="http://localhost/104_secoora/";
		}else {
			//scriptpath="http://"+$(location).attr('host')+"/~bebline/"
			scriptpath="http://"+$(location).attr('host')+"/"
		}
		console.log(scriptpath);
		
		$('.ajax_page_load').click(function(){
				$('#myModal2 .modal-body .content').empty();
				$('#myModal2 .modal-title').empty();
				var title = $(this).attr('title');
				$('#myModal2 .modal-title').html(title);
				
				/*ajax */
			    pageurl = $(this).attr('href');
				if(pageurl!=window.location) {
					//window.history.pushState({path: pageurl}, '', pageurl);
				}
	
				var post_id = $(this).attr("rel");
				
				if (post_id==61 && document.cookie.indexOf("allowDownload")<0) {
					$('#myModal3').modal({show:true});
					
				} else {
					$('#myModal2').modal({show:true});
					$(document).ajaxStart(function() {
							console.log( "Triggered ajaxStart handler." );
							$('#myModal2 .modal-body .progress').addClass('show');
							$('.progress .progress-bar').css({
								width: '0%'
							});									
							$('#myModal2 .modal-body .content').hide();
							
					});
					
					/* ajax page id for local is 748  for server 766 */
					$.ajax({
						xhr: function () {
							var xhr = new window.XMLHttpRequest();
							xhr.addEventListener("progress", function (evt) {
								if (evt.lengthComputable) {
									var percentComplete = evt.loaded / evt.total;
									console.log(evt.total);
									$('.progress .progress-bar').css({
										width: percentComplete * 100 + '%'
									});
								}
							}, false);
							return xhr;
						},
						type: 'POST',
						url: scriptpath+"?page_id=766",
						data: {id:post_id},
						success: function (data) {
							//console.log(data);
							//
							$('#myModal2 .modal-body .content').fadeIn('500',function(){$('#myModal2 .modal-body .progress').removeClass('show');}).html(data);
						}
					});	
				
				}
			
				
				/*
				$('.modal-body .content').load(scriptpath+"?page_id=33",{id:post_id},
				function(response, status, xhr){
					if ( status == "error" ) {
						var msg = "Sorry but there was an error: ";
						$( "#error" ).html( );
						console.log( msg + xhr.status + " " + xhr.statusText+ " " +window.location.href);				
					}
					console.log( $(location).attr('host'));
				}); // line 12
				*/
				
				
				
				return false;
			
		});		
		
		
		$(window).scroll(function(){
			//console.log('scrolling');
			//if ($("body").hasClass("logged-in") ) {
				//load_posts();
			//}
		});			
	//<!--ajax post-->		
	

	jQuery( document ).on( 'cf.form.submit', function (event, data ) {
		  //data.$form is a jQuery object for the form that just submitted.
		
		//log form id
		
		//console.log($form.data( 'form-id' ) );
		//setCookiesAndRedirect();
		
		var d = new Date();
		cname="allowDownload";
		cvalue="yes";
		exdays=100;
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires=" + d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";					

		  
	});		

	var header = document.getElementById("main-nav-sec");
	var sticky = header.offsetTop;
	$(window).on('scroll', function () {
		myFunction();
	});	

	// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
	function myFunction() {
	  if (window.pageYOffset >= sticky) {
		header.classList.add("sticky");
	  } else {
		header.classList.remove("sticky");
	  }
	} 

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
		

});

function body_loaded(){
	jQuery('.mainsec').animate({opacity: 1}, 750);
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

function getUrlVars(navpageid)
{
    var vars = [], hash;
    var hashes = navpageid.slice(navpageid.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function setCookiesAndRedirect(url) {
    var d = new Date();
	cname="allowDownload";
	cvalue="yes";
	exdays=100;
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    //location.replace(url);
}