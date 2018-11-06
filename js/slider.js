$(document).ready(function(){
    $("section.slider").slick({
        accesibility: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        centerMode: true        
    })
})