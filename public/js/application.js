$(function(){
    $('.toggle-preview').click(function(e){
        if($('.preview-wrapper').hasClass('hidden')) {
            if($('form #name').val() != '') {
                $('.preview-wrapper #preview-name').text($('form #name').val());
            }
            if($('form #email').val() != '') {
                $('.preview-wrapper #preview-email').text($('form #email').val());
            }
            if($('form #text').val() != '') {
                $('.preview-wrapper #preview-text').text($('form #text').val());
            }
            $('.form-wrapper').addClass('hidden');
            $('.preview-wrapper').removeClass('hidden')
        } else {
            $('.form-wrapper').removeClass('hidden');
            $('.preview-wrapper').addClass('hidden')
        }
    })
})