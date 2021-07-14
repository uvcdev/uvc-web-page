$(document).ready(function(){
    $('#more_dash').click(function(){
        $('#dash_modal').css({'display': 'block'});
        $('html').css({'overflowY': 'hidden'});
        $(".dash_slide").slick({
            arrows: false,
            infinite: false,
            draggable: false,
            dots: true
        });
    });
    $('.modal_closed').click(function(){
        $('#dash_modal').css({'display': 'none'});
        $('html').css({'overflowY': 'scroll'});
    });
});