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
    {
        'file_path': 'public/admin_assets/build/js/app.min.js',
        'files': [
           'public/admin_assets/js/app.js',
        ],
     },
     {
        'file_path': 'public/admin_assets/build/js/jquery.min.js',
        'files': [
            'public/admin_assets/js/jquery.js',
        ],
    }
];

buildScss = [
    {
        'file_path': 'public/admin_assets/build/css/style.min.css',
        'files': [
           'public/admin_assets/css/style.scss',
        ],
    },
    
];


build.map(function(item, index) {
    mix.scripts(item.files, item.file_path);
});

buildScss.forEach(function (value) {
    value.files.map((src, index) => {
        mix.sass(src, value.file_path);
    })
 });
mix.postCss("public/admin_assets/css/tailwindcss.css", "public/admin_assets/build/css/tailwindcss.min.css", [
    require("tailwindcss"),
]);