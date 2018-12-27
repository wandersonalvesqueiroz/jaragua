jQuery(document).ready(function ($) {
    $(window).on('resize', function () {
        $('.newspaper-box').height($('.newspaper-box').width() * 1.41);
    }).trigger('resize');
});