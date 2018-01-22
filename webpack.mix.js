let mix = require('laravel-mix');

mix.js('assets/js/app.js', 'app.js')
    .sass('assets/css/style.scss', 'style.css')
    .options({
    	processCssUrls: false
    });