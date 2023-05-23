jQuery(function($) {
    $('#fancy_icon-5727-581').on('click', function() {
        $.post(MyScript.ajaxurl, {
            action: 'track_click',
            page_url: window.location.href
        });
    });
});
