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

mix
    .sass('resources/sass/frontpage/app-frontpage.scss', 'public/css/app-frontpage.min.css')
    .js('resources/js/frontpage/app-frontpage.js', 'public/js/app-frontpage.min.js')
    .options({
        processCssUrls: false
    });
    
