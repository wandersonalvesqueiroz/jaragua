jQuery(document).ready(function ($) {
    $(window).on('resize', function () {
        $('.list-colaborators figure').height($('.list-colaborators figure').width());
    }).trigger('resize');
});