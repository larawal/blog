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

mix.js('resources/website/js/app.js', 'public/website/js')
   .sass('resources/website/sass/app.scss', 'public/website/css')
   .js([
      'resources/admin/js/app.js',
      'resources/admin/js/fontawesome.js'
   ], 'public/admin/js')
   .sass('resources/admin/sass/app.scss', 'public/admin/css');
