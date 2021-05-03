$(function() {
    $(document).on('click', 'a', function(e){
        var href = $(this).attr('href');

        if (!href) {
            e.preventDefault();
            var nextAnchor = $(document).find('a[name]').first();
            if (nextAnchor) {
                scrollToAnchor(nextAnchor);
            }
        }

        if (href.indexOf('#') == 0) {
            e.preventDefault();
            var anchorName = href.substr(1);
            var nextAnchor = $(document).find('a[name="'+anchorName+'"]').first();
            if (nextAnchor) {
                scrollToAnchor(nextAnchor);
            }
        }
        
    });

    function scrollToAnchor(anchor) {
        var newTop = anchor.offset().top - 80;

        var body = $('html, body');
        body.stop().animate({scrollTop:newTop}, 500, 'swing', function() { 
        
        });
    }

});
