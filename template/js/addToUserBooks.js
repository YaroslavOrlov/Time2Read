(function ($) {
    $(function () {
        $('.already-read').click(function (event) {
            $.ajax({
                url: '/book/AlreadyRead/'+ $('.tabs').attr('data-id'),
                type: 'POST',
                success: function(data){
                    $('.already-read').attr('disabled', true);
                    $('.reading').attr('disabled', false);
                    $('.want-read').attr('disabled', false);
                }
            });
        });
    });
    $(function () {
        $('.reading').click(function (event) {
            $.ajax({
                url: '/book/Reading/'+ $('.tabs').attr('data-id'),
                type: 'POST',
                success: function(data){
                    $('.reading').attr('disabled', true);
                    $('.already-read').attr('disabled', false);
                    $('.want-read').attr('disabled', false);
                }
            });
        });
    });
    $(function () {
        $('.want-read').click(function (event) {
            $.ajax({
                url: '/book/WantRead/'+ $('.tabs').attr('data-id'),
                type: 'POST',
                success: function(data){
                    $('.want-read').attr('disabled', true);
                    $('.reading').attr('disabled', false);
                    $('.already-read').attr('disabled', false);
                }
            });
        });
    });
    $(function () {
        $('.remove-user-books').click(function (event) {
            $.ajax({
                url: '/book/RemoveUserBook/'+ $('.tabs').attr('data-id'),
                type: 'POST',
                success: function(data){
                    $('.want-read').attr('disabled', false);
                    $('.reading').attr('disabled', false);
                    $('.already-read').attr('disabled', false);
                }
            });
        });
    });
})(jQuery);
