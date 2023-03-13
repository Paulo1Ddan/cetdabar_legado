$(document).ready(function(){
    $('.banner').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        pauseOnHover: false,
        fade: true,
        dots: true
    });
})
function getLinkSocial(destino){
    window.open(destino, '_blank')
}