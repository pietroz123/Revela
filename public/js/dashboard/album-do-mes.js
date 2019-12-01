$(document).ready(function() {

    /**
     * Template selection
     */
    $('.templates .template').click(function(){
        console.log($(this));
        $(this).parent().find('.template').removeClass('selected');
        $(this).addClass('selected');
        var val = $(this).attr('data-template-id');
        console.log('val: ', val);
        console.log('input: ', $('input#album-template'));
        
        $('input#album-template').val(val);
    });

});