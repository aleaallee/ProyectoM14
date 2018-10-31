$(document).ready(function(){
    $(window).on('load resize', function(){
        var actual = $('.actual').offset().left;
        
        $('.obj-nav a').hover(function(){
            var left = $(this).offset().left;
            var width = $(this).outerWidth();
            var start = 0;
            $('span.bar').css({'left': left, 'width': width});

        }, function(){
            var initwidth = $('.actual').width();
            if ($(window).width() > 1900) {
                $('span.bar').css({'left': '37.3vw', 'width': initwidth});
            }else{
                $('span.bar').css({'left': '39vw', 'width': initwidth});
            }
        });
    });
});