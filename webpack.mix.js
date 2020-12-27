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

mix.sass('resources/sass/client.scss', 'public/css');
mix.sass('resources/sass/global.scss', 'public/css');


mix.copyDirectory('resources/font','public/js');





