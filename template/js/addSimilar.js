(function ($) {
    $(function () {
        $('[data-book-i]').click(function (event) {
            $(this).attr('disabled', true);
            $.ajax({
                url: '/book/AddSimilar/' + $(this).attr('data-book-i'),
                type: 'POST'
            });
        });
    });
})(jQuery);