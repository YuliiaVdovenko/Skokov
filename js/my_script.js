$(document).ready(function () {
    var $grid = $('.grid').masonry({
        itemSelector: '.element-item'
    });

    $grid.imagesLoaded().progress( function() {
        $grid.masonry('layout');
    });
    
    var $news = $('.news-list').masonry({
        itemSelector: '.blog-element-item'
    });

    $news.imagesLoaded().progress( function() {
        $news.masonry('layout');
    });

    var $postsby = $('.posts-by-author').masonry({
        itemSelector: '.posts-by-author-item'
    });

    $postsby.imagesLoaded().progress( function() {
        $postsby.masonry('layout');
    });

    $('.slick-list').slick({
        dots: false,
        slidesToShow: 8,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 7
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 6
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    var $portfolio = $('.portfolio-list').isotope({
        itemSelector: '.portfolio-item'
    });

    $portfolio.imagesLoaded().progress( function() {
        $portfolio.isotope('layout');
    });

// bind filter button click
    $('#filters').on( 'click', 'span', function() {
        var filterValue = $( this ).attr('data-filter');
        // use filterFn if matches value
        $portfolio.isotope({ filter: filterValue });
    });

});
