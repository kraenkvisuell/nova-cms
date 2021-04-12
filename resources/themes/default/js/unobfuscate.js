$(function() {
    $('*[obfuscated-email]').each(function(){
        let email = atob($(this).text());
        $(this).replaceWith(email);
    });

    $('a').each(function(e){
        let href = $(this).attr('href');
        let needle = 'mailto:<span obfuscated-email>';
        if(typeof(href) != 'undefined' && href.indexOf(needle) > -1) {
            href = href.replace(needle, '');
            
            href = href.replace('</span>', '');
           
            href = 'mailto:'+atob(href);
            
            $(this).attr('href', href);
        }
    });

});
