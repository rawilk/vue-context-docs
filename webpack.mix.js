const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/demos/index.js', 'public/js/demos.js')
    .sass('resources/sass/app.scss', 'css')
    .tailwind('./tailwind.config.js')
    .options({
        terser: {
            extractComments: false,
        }
    })
    .version();
