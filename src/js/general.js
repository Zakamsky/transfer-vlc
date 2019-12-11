//= plugins/bootstrap.bundle.min.js

/* steacky menu:*/
function getBodyScrollTop() {
    let offset = self.pageYOffset || (document.documentElement && document.documentElement.scrollTop) || (document.body && document.body.scrollTop);
    if (offset > 400) {
        document.querySelector('.main-top-menu').classList.add('nav-fixed-top');
    }
    else {
        document.querySelector('.main-top-menu').classList.remove('nav-fixed-top');
    }
}
window.addEventListener("scroll", getBodyScrollTop);

// скрипт для скрытия формы после отправки
$(function() {
    $(document).on('wpcf7mailsent', function(event) {
        $('.feedback').slideUp(300);
    });
});

//bs4 menu close on click
$(document).on('click', function(){
    $('.collapse').collapse('hide');
})

//smooth transition to anchor
const anchors = document.querySelectorAll('a[href*="#"]')

for (let anchor of anchors) {
    anchor.addEventListener('click', function (e) {
        e.preventDefault()

        const blockID = anchor.getAttribute('href')

        document.querySelector('' + blockID).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        })
    })
}
//анимация чисел
$(function() {
    var num = $(".number");
    num.each(function(indx, el) {
        var max = $(el).data("max");
        var duration = 3000;
        var visibility = checkViewport(el);
        $(el).on("animeNum", function() {
            $({n: 0}).animate({n: max}, {
                easing: "linear",
                duration: duration,
                step: function(now, fx) {
                    $(el).html(now | 0)
                }
            })
        }).data("visibility", visibility);
        visibility && $(el).trigger("animeNum")
    });

    function checkViewport(el) {
        var H = document.documentElement.clientHeight,
            h = el.scrollHeight,
            pos = el.getBoundingClientRect();
        return pos.top + h > 0 && pos.bottom - h < H
    }
    $(window).scroll(function() {
        num.each(function(indx, el) {
            var visibility = checkViewport(el);
            el = $(el);
            var old = el.data("visibility");
            old != visibility && el.data("visibility", visibility) && !old && el.trigger("animeNum")
        })

    })
});