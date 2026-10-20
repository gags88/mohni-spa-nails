const mix = require("laravel-mix");
require("laravel-mix-purgecss");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.sass("resources/css/app.scss", "public/css").purgeCss();
mix.combine(
    [
        "resources/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js",
        "resources/js/vendor/jquery-library.js",
        "resources/js/vendor/bootstrap.min.js",
        "resources/js/owl.carousel.min.js",
        "resources/js/isotope.pkgd.js",
        "resources/js/isotop.js",
        "resources/js/countTo.js",
        "resources/js/appear.js",
        "resources/js/main.js",
    ],
    "public/js/app.js"
);
