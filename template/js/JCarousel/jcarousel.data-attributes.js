(function ($) {
    $(function () {
        $('[data-jcarousel]').each(function () {
            var el = $(this);
            el.jcarousel(el.data());
        });

        $('[data-jcarousel-control]').each(function () {
            var el = $(this);
            el.jcarouselControl(el.data());
        });

        $('.ajax-next').click(function (event) {
            $.ajax({
                url: '/quote/next',
                type: 'POST',
                success: function (data) {
                    var str = JSON.parse(data);
                    $('.present-quotes').append(
                        "<li>"
                        + str[0][0] +
                        "<p><h3>"
                        + str[0][1] +
                        "</h3></p>" +
                        "<div class='textalignright'><span><i class='fa fa-heart-o fa-2x'></i></span></div>" +
                        "</li>"
                    );
                }
            });
        });
    });
})(jQuery);
