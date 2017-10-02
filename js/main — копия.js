// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('body').on('click', '.page-scroll', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 75 )
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

;(function($) {	

	$(document).ready( function() {

		// MENU

		if ($(this).width() > 990) {
			$('.main').addClass('desk');
		}

		$('.btn-menu').on('click', function() {
			$(this).toggleClass('active');
			$('.mob-menu').slideToggle(300);
		});

		$('.btn-submenu').on('click', function() {
			var sub  = $(this).parent().siblings('.submenu, .mob-submenu, .megamenu');			   

			$(this).toggleClass('active');
			sub.slideToggle(300);
		});		


		$('.menu > li').each(function() {
			var sub = $(this).children('.submenu').size();
			if (sub > 0) $(this).addClass('with-sub');
		});

		$(window).resize(function() {
			if ($('.btn-menu').css('display') === 'block') {				
				$('.main').removeClass('desk');
			}
			else {
				$('.main').addClass('desk');
				$('.menu, .submenu, .b-search').removeAttr('style');
			}
		});

		// FORMS: SEARCH, COMMENT

		$('.btn-search').on('click', function() {
			$(this).toggleClass('active');
			$('.b-search').fadeToggle(300);
		});

		$('.search-submit, .comment-submit').on('click', function() {
			$(this).parent().submit();
		});

		$('.search-form').on('click', '.search-text-remove', function() {
			$(this).siblings('.search-text').val('');
		});


		$('.btn-reply').on('click', function() {
			if (!$(this).hasClass('cancel-reply')) {

				var comForm = $('.b-comment-form').clone();
				$('.b-comment-form').remove();

				$('.btn-reply').removeClass('cancel-reply').html('<b>reply</b>');
				$(this).addClass('cancel-reply').html('<b>cancel</b>');
				$(this).parent().parent().append(comForm);

				$(this).parent().parent().children('.b-comment-form')
					.focus(function() {
						$(this).siblings('i').addClass('focused');
					})
					.focusout(function() {
						$(this).siblings('i').removeClass('focused');
					});
			}
		});

		$(document)
			.on('click', '.cancel-reply', function() {
				var comForm = $(this).parent().siblings('.b-comment-form').clone();
				$(this).parent().siblings('.b-comment-form').remove();

				$(this).removeClass('cancel-reply').html('<b>reply</b>');
				$('.post').append(comForm);
			})
			.on('click', '.cancel-reply2', function(event) {
				event.preventDefault();

				var comForm = $(this).parent().parent().clone();
				$(this).parent().parent().remove();

				$('.cancel-reply').removeClass('cancel-reply').html('<b>reply</b>');
				$('.post').append(comForm);
			})
			.on('focus', 'input, textarea', function() {
				$(this).siblings('i').addClass('focused');
			})
			.on('focusout', 'input, textarea', function() {
				$(this).siblings('i').removeClass('focused');
			});


		
		// TABS

		(function() {
	
			$('.b-tabs').on('click', 'li', function() {
				var title  = $(this),
					tab    = title.parent().siblings().children().eq(title.index());

				if (title.parent().parent().hasClass('a-slide')) {
					var curTab = tab.siblings('.active');
					curTab.addClass('cur-tab').siblings().removeClass('cur-tab');
				}

				title.addClass('active').siblings().removeClass('active');
				tab.addClass('active').siblings().removeClass('active');		
			});

		}());

		// SPOILER 

		$('.spoiler-title').on('click', function() {
			$(this)
				.toggleClass('active')
				.next().slideToggle(250);
		});

		$('.b-accordion .spoiler-title').on('click', function() {
			$(this).parent().siblings()
				.children('.spoiler-title').removeClass('active')
				.next('.spoiler-content').slideUp(250);				
		});

		// PROGRESS BAR

		$('.b-progress-bar').each(function() {
    
			var cap = parseInt($(this).attr('data-capacity'), 10),
				val = parseInt($(this).attr('data-value'), 10),
				len = 100 * (val / cap) + '%';

			$(this).find('.progress-line').css('width', len);

		});

		// TEAM 

		$('.member-photo')
			.on('mouseenter', function() {
				$(this).children('.b-social').stop().fadeIn(200);
			})
			.on('mouseleave', function() {
				$(this).children('.b-social').stop().fadeOut(200);
			});

		$('.b-member.m-compact')
			.on('mouseenter', function() {
				$(this).children('.member-meta').stop().fadeIn(200);
			})
			.on('mouseleave', function() {
				$(this).children('.member-meta').stop().fadeOut(200);
			});

		// PORTFOLIO		

		$('.work-preview a').on('click', function() {
			$(this).parent().trigger('click');
		});

	
		// BUTTON UP

		var btnUp = $('<div/>', {'class':'btn-up'});
		btnUp.appendTo('body');

		$(document)
			.on('click', '.btn-up', function() {			
				$('html, body').animate({
					scrollTop: 0
				}, 700);
			});

		$(window)	
			.on('scroll', function() {			
				if ($(this).scrollTop() > 200)
					$('.btn-up').addClass('active');
				else
					$('.btn-up').removeClass('active');
			});

		// SETTINGS PANEL

		$('.btn-settings').on('click', function() {
			$(this).parent().toggleClass('active');
		});

		$('.switch-handle').on('click', function() {
			$(this).toggleClass('active');
			$('.main').toggleClass('boxed');
			
		});

		$('.bg-list div').on('click', function() {
			if ($(this).hasClass('active')) return false;
			if(!$('.switch-handle').hasClass('active')) $('.switch-handle').trigger('click');

			$(this).addClass('active').siblings().removeClass('active');    
			var cl = $(this).attr('class');
			$('body').attr('class', cl);
		});

		$('.color-list div').on('click', function() {
			if ($(this).hasClass('active')) return false;

			$('link.color-scheme-link').remove();
			
			$(this).addClass('active').siblings().removeClass('active');    
			var src 		= $(this).attr('data-src'),
				colorScheme = $('<link class="color-scheme-link" rel="stylesheet" />');

			colorScheme
				.attr('href', src)
				.appendTo('head');
		});

	});	

})(jQuery);

$(document).ready(function(){
	$(".header").sticky({topSpacing:0});
});


$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 200) {
        $(".header-transparent").addClass("header-trans-act");
    } else {
        $(".header-transparent").removeClass("header-trans-act");
    }
});
