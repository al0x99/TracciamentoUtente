jQuery(function($) {
    $('#_gallery-7640-581').on('click', function() {
        $.post(TrackUser.ajaxurl, {
            action: 'track_click',
            page_url: window.location.href
        });
    });
});
