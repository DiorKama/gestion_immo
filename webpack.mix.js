const mix = require('laravel-mix');

mix.js('resources/assets/core-site/scripts/app.js', 'public/assets/core-site/scripts')
    .js('resources/assets/core-admin/scripts/app.js', 'public/assets/core-admin/scripts')
    .sass('resources/assets/core-site/styles/app.scss', 'public/assets/core-site/styles')
    .sass('resources/assets/core-admin/styles/app.scss', 'public/assets/core-admin/styles')
    .copyDirectory('resources/assets/core-site/img', 'public/assets/core-site/img');
