(function ($) {
    $(function () {
        $('[data-quote]').click(function (event) {
            $(this).parent().parent().css('display','none');
            $.ajax({
                url: '/quote/remove/' + $(this).attr('data-quote'),
                type: 'POST'
            });
        });
    });
})(jQuery);
