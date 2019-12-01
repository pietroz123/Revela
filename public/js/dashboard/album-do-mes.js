$(document).ready(function() {

    /**
     * Template selection
     */
    $('.templates .template').click(function(){
        // Mark this template as selected
        $(this).parent().find('.template').removeClass('selected');
        $(this).addClass('selected');

        // Get template ID
        var val = $(this).attr('data-template-id');

        // Store ID on hidden input
        $('input#album-template').val(val);
    });

});