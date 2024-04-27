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

mix.sass('resources/sass/frontpage/app-frontpage.scss', 'public/css/app-frontpage.min.css')
    .sass('resources/sass/dashboard/style.scss', 'public/css/app-dashboard.min.css')
    .sass('resources/sass/dashboard/components.scss', 'public/css/app-dashboard-components.min.css')
    .sass('resources/sass/dashboard/berita.scss', 'public/css/app-dashboard-berita.min.css')
    .options({
        processCssUrls: false
    });
