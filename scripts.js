jQuery(function($) {
    $('#fancy_icon-13696-581').on('click', function() {
        $.post(MyScript.ajaxurl, {
            action: 'track_click',
            page_url: window.location.href
        });
    });
});
