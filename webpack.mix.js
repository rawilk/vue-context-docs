const mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix
    .sass('resources/sass/app.scss', 'css')
    .tailwind('./tailwind.config.js');

if (mix.inProduction()) {
    mix.version();
}
