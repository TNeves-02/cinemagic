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

mix.js('resources/js/app.js', 'public/js')
    .js('node_modules/jquery/dist/jquery.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/sb-admin-2.js', 'public/js')
    .js('resources/js/sb-admin-2.min.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/estilos.css', 'public/css')
    .postCss('resources/css/estilos-admin.css', 'public/css')
    .postCss('resources/css/sb-admin-2.css', 'public/css')
    .postCss('resources/css/sb-admin-2.min.css', 'public/css')
    .postCss('node_modules/@fortawesome/fontawesome-free/css/all.css','public/css')
    .sourceMaps();
