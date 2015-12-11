(function ($) {
    $(function () {
        $('.already-read').click(function (event) {
            $.ajax({
                url: '/book/AlreadyRead/' + $('.tabs').attr('data-id'),
                type: 'POST',
                success: function (data) {
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
                url: '/book/Reading/' + $('.tabs').attr('data-id'),
                type: 'POST',
                success: function (data) {
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
                url: '/book/WantRead/' + $('.tabs').attr('data-id'),
                type: 'POST',
                success: function (data) {
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
                url: '/book/RemoveUserBook/' + $('.tabs').attr('data-id'),
                type: 'POST',
                success: function (data) {
                    $('.want-read').attr('disabled', false);
                    $('.reading').attr('disabled', false);
                    $('.already-read').attr('disabled', false);
                }
            });
        });
    });
    $(function () {
        $('.markable').click(function (event) {
            var target = event.target;
            $.ajax({
                url: '/book/marked/' + $('.tabs').attr('data-id') + '/' + target.getAttribute('data-mark'),
                type: 'POST',
                success: function (data) {
                    $('.markable').children().removeClass('fa-star').addClass('fa-star-o');

                    var elem = $('.markable').children()[0];
                    while (elem.getAttribute('data-mark') < target.getAttribute('data-mark')) {
                        elem.className = "fa fa-star fa-2x";
                        elem = elem.nextElementSibling;
                    }
                    elem.className = "fa fa-star fa-2x";
                    data = JSON.parse(data);
                    $('#avg-mark').text((Math.round((data[0][1] / data[0][0]) * 100)) / 100);
                    $('#mark').text(data[0][0]);
                }
            });
        });
    });
})(jQuery);
