$(function() {
    if($('.vacancy-form .vacancy-form__file').length > 0){
        $('.vacancy-form__file').on('click',function(){
            $(this).closest('form').find('input[type=file]').trigger('click');
        })
        $('.vacancy-form__file').parent().find('input[type="file"]').on('change',function(){
            if($(this)[0].files.length > 0){
                $('.vacancy-form__file').addClass('file_selected');
                $('.vacancy-form__file-choosen').html('Выбран: '+$(this)[0].files[0].name + ' <br> Выбрать другой файл.');
            }else{
                $('.vacancy-form__file').removeClass('file_selected');
            }
        })
    }
})