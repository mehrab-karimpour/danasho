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


mix.combine([
    'resources/js/jquery-3.5.1.min.js',
    'resources/js/bootstrap.min.js'
], 'public/js/app.js')

mix.combine([
    'resources/js/app/index.js',
    'resources/js/app/login.js'
], 'public/js/custom.js')

mix.combine([
    'resources/js/onlineClass/index.js',
    'resources/js/onlineClass/step1.js',
    'resources/js/onlineClass/step2.js',
    'resources/js/onlineClass/step3.js',
    'resources/js/onlineClass/step4.js',
    'resources/js/onlineClass/eventHandler.js',
], 'public/js/index.js')


mix.combine([
    'resources/js/dependenci/slider.js',
], 'public/js/slider.js')

mix.combine([
    'public/js/header.js',
], 'public/js/header.js')

mix.sass('resources/sass/client.scss', 'public/css');
mix.sass('resources/sass/global.scss', 'public/css/global.css');
mix.sass('resources/sass/slider.scss', 'public/css');
mix.sass('resources/sass/mobile.scss', 'public/css/mobile.css');
mix.sass('resources/sass/index.scss', 'public/css/index.css');


mix.styles([
    'public/css/header.css',
], 'public/css/header.css');


mix.copyDirectory('resources/font', 'public/js/font/');
mix.copyDirectory('resources/js/dependenci', 'public/js');
mix.copyDirectory('resources/image/', 'public/image/');


// production



