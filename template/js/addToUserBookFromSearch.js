(function ($) {
    $(function () {
        $('.already-read').click(function (event) {
            var id = $(this).parent().attr('data-book-id');
            var elem = $('[data-book-id =' + id + ']');
            $.ajax({
                url: '/book/AlreadyRead/' + id,
                type: 'POST',
                success: function (data) {
                    elem.children()[0].setAttribute('disabled', 'true');
                    elem.children()[1].removeAttribute('disabled');
                    elem.children()[2].removeAttribute('disabled');
                }
            });
        });
    });
    $(function () {
        $('.reading').click(function (event) {
            var id = $(this).parent().attr('data-book-id');
            var elem = $('[data-book-id =' + id + ']');
            $.ajax({
                url: '/book/Reading/' + id,
                type: 'POST',
                success: function (data) {
                    elem.children()[0].removeAttribute('disabled');
                    elem.children()[1].setAttribute('disabled', 'true');
                    elem.children()[2].removeAttribute('disabled');
                }
            });
        });
    });
    $(function () {
        $('.want-read').click(function (event) {
            var id = $(this).parent().attr('data-book-id');
            var elem = $('[data-book-id =' + id + ']');
            $.ajax({
                url: '/book/WantRead/' + id,
                type: 'POST',
                success: function (data) {
                    elem.children()[0].removeAttribute('disabled');
                    elem.children()[1].removeAttribute('disabled');
                    elem.children()[2].setAttribute('disabled', 'true');
                }
            });
        });
    });
    $(function () {
        $('.remove-user-books').click(function (event) {
            var id = $(this).parent().attr('data-book-id');
            var elem = $('[data-book-id =' + id + ']');
            $.ajax({
                url: '/book/RemoveUserBook/' + id,
                type: 'POST',
                success: function (data) {
                    elem.children()[0].removeAttribute('disabled');
                    elem.children()[1].removeAttribute('disabled');
                    elem.children()[2].removeAttribute('disabled');
                }
            });
        });
    });
    $(function () {
        $('.markable').click(function (event) {
            var target = event.target;
            var idbook = target.getAttribute('data-id-book');
            var markbook = target.getAttribute('data-mark');
            $.ajax({
                url: '/book/marked/' + idbook + '/' + markbook,
                type: 'POST',
                success: function (data) {
                    $('[data-idbook =' + idbook + ']').children().removeClass('fa-star').addClass('fa-star-o');

                    var elem = $('[data-idbook =' + idbook + ']').children()[0];
                    while (elem.getAttribute('data-mark') < target.getAttribute('data-mark')) {
                        elem.className = "fa fa-star fa-2x";
                        elem = elem.nextElementSibling;
                    }
                    elem.className = "fa fa-star fa-2x";
                    data = JSON.parse(data);
                    $('[data-avg =' + idbook + ']').text((Math.round((data[0][1] / data[0][0]) * 100)) / 100);
                    $('[data-allmark =' + idbook + ']').text(data[0][0]);
                }
            });
        });
    });
})(jQuery);
