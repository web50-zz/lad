$(function() {
    $('.buter').on('click',function(){
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $('.top-menu').slideDown();
        }else{
            $('.top-menu').fadeIn('fast');
        }
        $('.top-menu__close2').show();
        $('.buter').hide();
        $('.header').addClass('header__menu-opened');
        $('.top-menu__decor').addClass('animate__animated animate__rotateIn');
    })
    $('.top-menu__close2').on('click',function(){
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $('.top-menu').slideUp();
        }else{
            $('.top-menu').fadeOut('fast');
        }
        $('.header').removeClass('header__menu-opened');
        $('.top-menu__close2').hide();
        $('.buter').show();
        $('.top-menu__decor').removeClass('animate__animated animate__rotateIn');
    })
})