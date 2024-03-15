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

build = [
    
];

buildScss = [
 
];


build.map(function(item, index) {
    mix.scripts(item.files, item.file_path);
});

buildScss.forEach(function (value) {
    value.files.map((src, index) => {
        mix.sass(src, value.file_path);
    })
 });
mix.postCss('public/admin_assets/css/tailwindcss.css', 'public/admin_assets/build/css/tailwindcss.min.css', [
    require('tailwindcss')
]);