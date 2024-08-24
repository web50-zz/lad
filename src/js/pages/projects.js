import aos from "aos";
$(function() {
    var projects_filter = {
        init:function(){
            this.wrap = $('.projects__filter');
            let o = this;
            let ao = aos;
            this.wrap.find('div').each(function(){
                let el = $(this);
                $(this).on('click',function(){
                    o.wrap.find('div.active').removeClass('active');
                    projects_filter.doFilter(el);
                    setTimeout(function(){
                        ao.refresh();
                    },500);
                    
                })
            });
        },
        doFilter:function(el){
            let id = el.attr('data-id');
            el.addClass('active');
            let str = 'data-type-'+id+'="1"';
            if(id == 'all'){
                $('.projects__list-item').css('display','flex');
            }else{
                $('.projects__list-item:not(['+str+'])').fadeOut();
                $('.projects__list-item['+str+']').fadeIn();
            }
        }
    }
    if($('.projects__filter').length == 1){
        projects_filter.init();
    }
})