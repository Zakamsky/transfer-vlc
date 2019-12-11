//= plugins/owl/owl.carousel.js
//= plugins/owl/owl.autoplay.js
//= plugins/owl/owl.autorefresh.js
//= plugins/owl/owl.hash.js
//= plugins/owl/owl.support.js
//= plugins/owl/owl.lazyload.js
//= plugins/owl/owl.navigation.js

//= plugins/owl/owl_custom.js


function getBodyScrollTop() {
    let offset = self.pageYOffset || (document.documentElement && document.documentElement.scrollTop) || (document.body && document.body.scrollTop);
    if (offset > 400) {
        document.querySelector('.storefront-primary-navigation').classList.add('fixed-top');
    }
    else {
        document.querySelector('.storefront-primary-navigation').classList.remove('fixed-top');
    }
}
window.addEventListener("scroll", getBodyScrollTop);

