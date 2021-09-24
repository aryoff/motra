const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .extract(['axios', 'lodash', 'moment', 'popper.js', 'jquery', 'jquery-ui-bundle', 'bootstrap', 'admin-lte', 'overlayscrollbars'])
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .sass('resources/sass/vendor.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync('http://localhost:8000')
    .disableNotifications();
if (mix.inProduction()) {
    mix.version().disableNotifications();
}