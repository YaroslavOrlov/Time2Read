(function ($){
    $(function() {
        $('[data-fa-heart-i]').click(function(event) {
            $($($(this).children()[0]).children()[0]).toggleClass('fa-heart-o');
            $($($(this).children()[0]).children()[0]).toggleClass('fa-heart');
            $.ajax({
                url: '/quote/like/' + $(this).attr('data-fa-heart-i'),
                type: 'POST'
            });
        })
    })
})(jQuery)