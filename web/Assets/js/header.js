$(document).ready(function(){
    var myCarousel=$('#myCarousel');
    $(".dropdown").on('hover',   function(event) {
            event.preventDefault();
            $('.dropdown-menu', this).stop( true, true )
                                    .slideDown("slow");
            $(this).toggleClass('open');
        },
        function(event) {
            event.preventDefault();

            $('.dropdown-menu', this)
                .stop( true, true )
                .slideUp("slow");
            $(this).toggleClass('open');
        }
    );
});
/*
  gestion du carroussel
 */
$(document).ready( function() {
    var myCarousel=$('#myCarousel');

    myCarousel.carousel({
        interval:   4000
    });

        /*var clickEvent = false;
    myCarousel.on('click', '.nav a', function(event) {
        event.preventDefault();
        clickEvent = true;
        $('.nav li').removeClass('active');
        //$(this).parent().addClass('active');
    }).on('slid.bs.carousel', function(e) {
        if(!clickEvent) {
            var count = $('.nav').children().length -1;
            var current = $('.nav li.active');

            current.removeClass('active')
                   .next()
                   .addClass('active');
            var id = parseInt(current.data('slide-to'));
            if(count === id) {
                $('.nav li').first().addClass('active');
            }
        }
        clickEvent = false;
    });*/
});