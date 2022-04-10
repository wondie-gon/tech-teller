jQuery(document).ready(function($) {

    // slider for frontpage top
    var top_slide_speed = techtellerSlider.slideSpeedTop;
    $('.tt-slick-slider').slick({
        arrows: true,
        asNavFor: null,
        prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
        nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
        autoplay: true,
        autoplaySpeed: top_slide_speed,
        centerMode: false,
    });

    //slick slider for continous slider
    var inf_slider_num = parseInt(techtellerSlider.sliderNumInf);
    var inf_slide_speed = techtellerSlider.slideSpeedInf;

    $(".tt-continous-slider").slick({
        dots: false,
        arrows: true,
        infinite: true,
        asNavFor: null,
        prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
        nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
        autoplay: true,
        autoplaySpeed: inf_slide_speed,
        slidesToShow:  inf_slider_num,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    // equal height for sliders

    var tech_teller_slider_height = 73/100 * $('.tt-continous-slider.slick-initialized.slick-slider').height();

    $('.tt-continous-slider .tech-teller-slick-inner').css('min-height', tech_teller_slider_height);

    $('.tt-continous-slider .tech-teller-slick-inner img').css('height', tech_teller_slider_height);

    
});