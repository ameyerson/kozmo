$(function() {

    // Use Modernizr to detect for touch devices, 
    // which don't support autoplay and may have less bandwidth, 
    // so just give them the poster images instead
    var screenIndex = 1,
        BV,
        videoPlayer,
        isTouch = Modernizr.touch,
        $bigImage = $('.big-image'),
        $window = $(window);
    
    if (!isTouch) {
        // initialize BigVideo
        BV = new $.BigVideo({forceAutoplay:isTouch});
        BV.init();
        showVideo();
        
        BV.getPlayer().addEvent('loadeddata', function() {
            onVideoLoaded();
        });

    }
    

    function showVideo() {
        BV.show($('#screen-'+screenIndex).attr('data-video'),{ambient:true});
    }
    function onVideoLoaded() {
        $('#screen-'+screenIndex).find('.big-image').fadeOut(500);
    }

    $('#screen-nav a').click(function(e) {
    	e.preventDefault();

    	screenClicked = $(this).attr('rel');
    	if ((screenClicked === screenIndex) || $('body').data('transitioning')) {
    		return;
    	}
    	$now = $('#screen-' + screenIndex);
    	$next = $('#screen-' + screenClicked);

    	screenIndex = screenClicked;

    	$('body').data('transitioning', true);

    	$next.fadeIn(
    		500,
    		'swing',
    		function(){
    			showVideo();
    			$now.hide().find('.big-image').show();
    			$('body').data('transitioning', false);
    		}
    	);

    });

});