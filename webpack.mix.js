const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/assets/core-admin/scripts/app.js', 'public/assets/core-admin/scripts')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/assets/core-admin/styles/app.scss', 'public/assets/core-admin/styles');
