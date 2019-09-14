const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([

    'resources/plantilla/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
    'resources/plantilla/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
    'resources/plantilla/plugins/OwlCarousel2-2.2.1/animate.css',
    'resources/plantilla/plugins/slick-1.8.0/slick.css',
],'public/css/plantilla.css')
.scripts([
    'resources/plantilla/js/jquery-3.3.1.min.js',
    'resources/plantilla/styles/bootstrap4/popper.js',
    'resources/plantilla/plugins/greensock/TweenMax.min.js',
    'resources/plantilla/plugins/greensock/TimelineMax.min.js',
    'resources/plantilla/plugins/scrollmagic/ScrollMagic.min.js',
    'resources/plantilla/plugins/greensock/animation.gsap.min.js',
    'resources/plantilla/plugins/greensock/ScrollToPlugin.min.js',
    'resources/plantilla/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
    'resources/plantilla/plugins/slick-1.8.0/slick.js',
    'resources/plantilla/plugins/easing/easing.js',
    'resources/plantilla/js/sweetalert2.all.min.js'
],'public/js/plantilla.js')
.js('resources/js/app.js', 'public/js');
