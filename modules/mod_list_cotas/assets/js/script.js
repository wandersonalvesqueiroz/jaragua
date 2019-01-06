jQuery(document).ready(function ($) {
    $(window).on('resize', function () {
        $('.list-list_cotas figure').height($('.list-list_cotas figure').width());
    }).trigger('resize');
});