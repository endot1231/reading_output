const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack buil
 | for
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.js('resources/js/app.js', 'public/js')
 .browserSync({
    files: [
       'resources/**/*',
       'app/**/*',
       'config/**/*',
       'routes/**/*',
       'public/**/*'
    ],
    proxy: 'http://localhost:8000',
 }).vue({ version:2});