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
    'resources/js/app/index.js',
    'resources/js/app/login.js'
], 'public/js/custom.js')


mix.combine([
    'resources/js/validate.js',
    'resources/js/onlineClass/index.js',
    'resources/js/onlineClass/step1.js',
    'resources/js/onlineClass/step2.js',
    'resources/js/onlineClass/step3.js',
    'resources/js/onlineClass/step4.js',
    'resources/js/onlineClass/eventHandler.js',
    'resources/js/offlineClass/indexOffline.js',
    'resources/js/offlineClass/offlineStep1.js',
    'resources/js/offlineClass/offlineStep2.js',
    'resources/js/offlineClass/offlineStep3.js',
    'resources/js/offlineClass/offlineStep4.js',
    'resources/js/offlineClass/eventHandler-offline.js',
    'resources/js/app.js',

], 'public/js/index.js');

/*  panel section   */
mix.combine([
    'resources/js/panel/vendor.bundle.base.js',
    'resources/js/panel/off-canvas.js',

], 'public/js/panel/panel.js');
mix.combine([
    'resources/js/panel/custom/edit-profile.js',
], 'public/js/panel/editProfile.js')
mix.combine([
    'resources/js/ticket.js',
], 'public/js/panel/ticket.js')


mix.combine([
    'resources/js/dependenci/header.js',
], 'public/js/header.js')

mix.sass('resources/sass/client.scss', 'public/css');
mix.sass('resources/sass/global.scss', 'public/css/global.css');
mix.sass('resources/sass/slider.scss', 'public/css');
mix.sass('resources/sass/mobile.scss', 'public/css/mobile.css');
mix.sass('resources/sass/index.scss', 'public/css/index.css');


mix.styles([
    'resources/sass/header.scss',
], 'public/css/header.css');


mix.copyDirectory('resources/font', 'public/js/font/');
mix.copyDirectory('resources/js/dependenci', 'public/js');
mix.copyDirectory('resources/image/', 'public/image/');


// production


/*  panel  link*/
mix.sass('resources/sass/panel/panel.scss', 'public/css/panel/panel.css');
mix.sass('resources/sass/panel/home.scss', 'public/css/panel/home.css');
mix.sass('resources/sass/panel/edit-profile.scss', 'public/css/panel/edit-profile.css');
mix.sass('resources/sass/panel/online-reserved.scss', 'public/css/panel/online-reserved.css');
mix.sass('resources/sass/panel/online-held.scss', 'public/css/panel/online-held.css');
mix.sass('resources/sass/panel/online-create.scss', 'public/css/panel/online-create.css');
mix.sass('resources/sass/panel/new-ticket.scss', 'public/css/panel/new-ticket.css');


/*
* auth section scss and js file
* */

mix.sass('resources/sass/auth/register.scss', 'public/css/auth/register.css');
mix.sass('resources/sass/auth/login.scss', 'public/css/auth/login.css');

/*  online class successful created   */
mix.sass('resources/sass/online-success.scss', 'public/css/online-success.css');

mix.combine([
    'resources/js/register.js',
], 'public/js/register.js');
mix.combine([
    'resources/js/login.js',
], 'public/js/login.js');

/*
* panel js
* */

mix.combine([
    'resources/js/panel/custom/home.js',
], 'public/js/panel/home.js');
