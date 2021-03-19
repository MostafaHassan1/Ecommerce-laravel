const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .scripts(
        [
            "resources/js/jquery-1.12.4.minb8ff.js",
            "resources/js/jquery-ui-1.12.4.minb8ff.js",
            "resources/js/bootstrap.min.js",
            "resources/js/jquery.flexslider.js",
            "resources/js/owl.carousel.min.js",
            "resources/js/jquery.countdown.min.js",
            "resources/js/jquery.sticky.js",
            "resources/js/functions.js",
        ],
        "public/js/all.js"
    )
    .styles(
        [
            "resources/css/animate.css",
            "resources/css/font-awesome.min.css",
            "resources/css/bootstrap.min.css",
            "resources/css/owl.carousel.min.css",
            "resources/css/flexslider.css",
            "resources/css/chosen.min.css",
            "resources/css/style.css",
            "resources/css/color-02.css",
        ],
        "public/css/all.css"
    )
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ]);

if (mix.inProduction()) {
    mix.version();
}
