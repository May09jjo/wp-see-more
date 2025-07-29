/**
 * WP See More - jQuery script
 */
jQuery(document).ready(function($) {
    // Hide the content area initially and the "show less" link
    $('.wpsm-content').addClass('wpsm-content-hide');

    // Click event for "show more"
    $('.wpsm-show').on('click', function(e) {
        e.preventDefault();
        // Show the content area
        $(this).next('.wpsm-content').removeClass('wpsm-content-hide');
        // Hide the "show more" link itself
        $(this).addClass('wpsm-content-hide');
    });

    // Click event for "show less"
    $('.wpsm-hide').on('click', function(e) {
        e.preventDefault();
        var wpsmContent = $(this).parent('.wpsm-content');
        // Hide the content area
        wpsmContent.addClass('wpsm-content-hide');
        // Show the original "show more" link
        wpsmContent.prev('.wpsm-show').removeClass('wpsm-content-hide');
    });
});
