$(document).ready(function() {
    $('.slick').slick({
        dots: true, // Show dots
        infinite: true,
        speed: 300,
        slidesToShow: 2, // Show 2 slides at a time
        slidesToScroll: 2, // Scroll 2 slides at a time
        centerMode: false, // Disable center mode
        arrows: false, // Hide previous and next arrows
        autoplay: true, // Enable autoplay
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false
                }
            }
        ]
    });
});
