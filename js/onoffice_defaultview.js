(function($) {
    $(function() {
        $(document).ready(function() {
            $('#oo-galleryslide').slick({
                infinite: true,
                slidesToShow: 1
            });

            $('#oo-similarframe').slick({
                infinite: true,
                arrows: false,
                dots: true,
                autoplay: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2
                    }
                }, {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1
                    }
                }]
            });
        });
    });
})(jQuery);