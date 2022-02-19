$(document).ready(function(){
// "use strict";

// meanmenu
$('#mobile-menu').meanmenu({
	meanMenuContainer: '.mobile-menu',
	meanScreenWidth: "992"
});

// One Page Nav
var top_offset = $('.header-area').height() - 10;
$('.main-menu nav ul').onePageNav({
	currentClass: 'active',
	scrollOffset: top_offset,
});


$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 245) {
		$(".header-sticky").removeClass("sticky");
	} else {
		$(".header-sticky").addClass("sticky");
	}
});


// mainSlider
function mainSlider() {
	var BasicSlider = $('.slider-active');
	BasicSlider.on('init', function (e, slick) {
		var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	BasicSlider.slick({
		autoplay: false,
		autoplaySpeed: 10000,
		dots: false,
		fade: true,
		arrows: false,
		responsive: [
			{ breakpoint: 767, settings: { dots: false, arrows: false } }
		]
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}
}
mainSlider();

/* magnificPopup img view */
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
	  enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});


// isotop
$('.grid').imagesLoaded( function() {
	// init Isotope
	var $grid = $('.grid').isotope({
	  itemSelector: '.grid-item',
	  percentPosition: true,
	  masonry: {
		// use outer width of grid-sizer for columnWidth
		columnWidth: '.grid-item',
	  }
	});
});

// filter items on button click
$('.portfolio-menu').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});

//for menu active class
$('.portfolio-menu button').on('click', function(event) {
	$(this).siblings('.active').removeClass('active');
	$(this).addClass('active');
	event.preventDefault();
});


// scrollToTop
$.scrollUp({
	scrollName: 'scrollUp', // Element ID
	topDistance: '300', // Distance from top before showing element (px)
	topSpeed: 300, // Speed back to top (ms)
	animation: 'fade', // Fade, slide, none
	animationInSpeed: 200, // Animation in speed (ms)
	animationOutSpeed: 200, // Animation out speed (ms)
	scrollText: '<i class="las la-angle-double-up"></i>', // Text for element
	activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});

// WOW active
new WOW().init();

// open lang dropdown
$('.lang').click(function(){
	$('.lang-switcher').toggleClass('active')
})
// $('.lang-option').click(function(){
// 	$('.lang-switcher').removeClass('active');
// })
// $('.lang-dropdown #eng').click(function(){
// 	$('html').removeAttr('dir')
// 	$('html').attr("dir", "ltr")
// })
// $('.lang-dropdown #ar').click(function(){
// 	$('html').removeAttr('dir')
// 	$('html').attr("dir", "rtl")
// })


// open sidebar
$('.main-menu-toggle').click(function(){
	$('.off-canvas-main-menu').toggleClass('active')
})
$('.off-canvas-menu-close').click(function(){
	$('.off-canvas-main-menu').removeClass('active')
})
// open chat sidebar
$('.chat-opener-btn').click(function(){
	$('.chat-left-sidebar').toggleClass('active')
})
$('.chat-user-item').click(function(){
	$('.chat-left-sidebar').removeClass('active')
})


// slider
$('.slider').owlCarousel({
	rtl:true,
    loop:true,
    margin:0,
	items:1,
	navText:['<i class="las la-long-arrow-alt-left"></i>','<i class="las la-long-arrow-alt-right"></i>'],
    nav:true,
	dots:false,
	animateOut: 'fadeOut',
	mouseDrag:false,
	touchDrag:false
})
// post-details-slider
$('.post-details-slider').owlCarousel({
	rtl:true,
    loop:true,
    margin:0,
	items:1,
	navText:['<i class="las la-long-arrow-alt-left"></i>','<i class="las la-long-arrow-alt-right"></i>'],
    nav:true,
	dots:false,
	animateOut: 'fadeOut',
	mouseDrag:false,
	touchDrag:false
})
// service category
$('.service-category').owlCarousel({
	rtl:true,
    loop:true,
    margin:0,
	items:7,
    navText:['<i class="las la-long-arrow-alt-left"></i>','<i class="las la-long-arrow-alt-right"></i>'],
    nav:true,
	dots:false,
	responsive:{
        0:{
            items:3
        },
        767:{
            items:4
        },
        992:{
            items:7
        }
    }
})
// posts
$('.posts').owlCarousel({
	rtl:true,
    loop:true,
    margin:30,
	items:3,
	navText:['<i class="las la-long-arrow-alt-left"></i>','<i class="las la-long-arrow-alt-right"></i>'],
    nav:true,
	dots:false,
	responsive:{
        0:{
            items:1
        },
        767:{
            items:2
        },
        992:{
            items:2
        },
		1200:{
			items:3
		}

    }
})

	$('body').off('click', "#login-btn").on('click', "#login-btn", function(event) {
        event.preventDefault();
        var btn = $(this);
        var old_val = btn.val();
        var form = btn.closest('form');
        var formData = new FormData(form[0]);
        var submitUrl = btn.data('url') ? btn.data('url') : "";

        if (submitUrl) {
            $.ajax({
                url: submitUrl,
                type: 'post',
                dataType: 'json',
                data: form.serialize(),
                // data:  formData,
                // contentType: false,
                // cache: false,
                // processData:false,
                beforeSend: function() {
                    $('.error,.submit_notification').html('');
                    form.find(".form-control").removeClass("red-border");
                    $('.btn').attr("disabled", "disabled").val("Sending...");
                },
                success: function(result) {
                    $('.error').html('');
                    $('.btn').removeAttr("disabled").val(old_val);
                    if (result.code == 200) {
                        window.location.reload();
                    } else if (result.code == 402) {
                        $.each(result.errors, function(i, val) {
                            if (val != "") {
                                console.log("#" + i + "_error");
                                form.find("#" + i + "_error").text(val);
                            }
                        });
                    } else {
                        form.find('.submit_notification').html('<span class="text-danger error">' + result.message + '</span>');
                    }
                },
                error: function(e) {
                    $('.btn').removeAttr("disabled").val(old_val);
                    form.find('.submit_notification').html('<span class="text-danger error">Something Went Wrong!... Please try again after refresh</span>');
                }
            });
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#commonModal').on('show.bs.modal', function (e) {

        var btn = $(e.relatedTarget);
        var type = btn.data('type');
        var modalContent = $(this).find('.modal-content');
        var url = btn.data('url') ? btn.data('url') : "";
        if (url) {
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'html',
                data: {type: type },
                beforeSend: function() {
                    modalContent.html('<div class="text-center p-5"><i class="la la-5x la-spin la-spinner"></i><div> Loading...</div></div>')
                    $('.error,.submit_notification').html('');
                },
                success: function(result) {
                    $('.error').html('');
                    modalContent.html(result);
                    setTimeout(function(){
                        loadSubCategory();
                    },1000);
                },
                error: function(e) {
                    modalContent.html('<div class="modal-header pt-45"><h5 class="modal-title">Post</h5></div><div class="modal-body"><span class="text-danger error">Something Went Wrong!... Please try again after refresh</span><div class="modal-footer pb-35"><button type="button" class="btn theme-btn-light" data-bs-dismiss="modal">Cancel</button></div>');
                }
            });
        }
        
    });

    
    $('body').off('click', "#savePost").on('click', "#savePost", function(event) {
        event.preventDefault();
        var btn = $(this);
        var old_val = btn.val();
        var form = $('#savePostForm');
        var formData = new FormData(form[0]);
        var submitUrl = btn.data('url') ? btn.data('url') : "";

        if (submitUrl) {
            $.ajax({
                url: submitUrl,
                type: 'post',
                dataType: 'json',
                data:  formData,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function() {
                    $('.error,.submit_notification').html('');
                    form.find(".form-control").removeClass("red-border");
                    $('.btn').attr("disabled", "disabled").val("Sending...");
                },
                success: function(result) {
                    $('.error').html('');
                    $('.btn').removeAttr("disabled").val(old_val);
                    if (result.status == 200) {
                        window.location.reload();
                        $('#post_submit_notification').html('<span class="text-success error">' + result.message + '</span>');
                    } else if (result.status == 402) {
                        $.each(result.errors, function(i, val) {
                            if (val != "") {
                                form.find("#" + i + "_error").text(val);
                            }
                        });
                        console.log('hello');
                        $("#commonModal").animate({ scrollTop: 100 }, "slow");
                    } else {
                        $('#post_submit_notification').html('<span class="text-danger error">' + result.message + '</span>');
                    }
                },
                error: function(e) {
                    $('.btn').removeAttr("disabled").val(old_val);
                    $('#post_submit_notification').html('<span class="text-danger error">Something Went Wrong!... Please try again after refresh</span>');
                }
            });
        }
    });

});

function setLocale(lang) {
	if (lang == 'ar') {
        $('html').removeAttr('dir')
        $('html').attr("dir", "rtl")
    } else {
        $('html').removeAttr('dir')
        $('html').attr("dir", "ltr")
    }
}