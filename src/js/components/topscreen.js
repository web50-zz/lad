$(function() {
    if($('.shifted-title').length == 1){
        var getWindowScroll = function getWindowScroll() {
            return window.scrollY || window.pageYOffset;
        };
        var updateTitle = function updateTitle(title, dummy) {
            return function() {
                var transform = Math.min(title.offsetHeight + parseInt(window.getComputedStyle(title, null).getPropertyValue("bottom"), 10), getWindowScroll());
                var height = Math.min(title.offsetHeight, Math.max(0, getWindowScroll() - parseInt(window.getComputedStyle(title, null).getPropertyValue("bottom"), 10)));
                title.style["-ms-transform"] = "translate(0px, ".concat(transform, "px)");
                title.style["-webkit-transform"] = "translate(0px, ".concat(transform, "px)");
                title.style.transform = "translate(0px, ".concat(transform, "px)");
                dummy.style.height = "".concat(height, "px");
            };
        };
        var initTitle = function initTitle(element) {
            var title = element;
            var dummy = $(".shifted-title-dummy").get()[0];
            updateTitle(title, dummy)();
            window.addEventListener("scroll", updateTitle(title, dummy));
            window.addEventListener("resize", updateTitle(title, dummy));
        };
    
        initTitle($('.shifted-title').get()[0]);
    }
})