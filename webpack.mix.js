const mix = require('laravel-mix');

if (mix.inProduction()) {
    require('laravel-mix-polyfill');
    const TargetsPlugin = require('targets-webpack-plugin')
    mix.webpackConfig({
        plugins: [
            new TargetsPlugin({
                browsers: ['last 2 versions', 'chrome >= 41', 'IE 11'],
            }),
        ],
    });
}

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


// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');


//admin
var mix_admin = mix.js('resources/js/admin.js', 'public/assets/admin/js')
    .sass('resources/sass/admin.scss', 'public/assets/admin/css');



// fontend
var mix_frontend = mix.js('resources/js/app.js', 'public/assets/frontend/common/js')
   .sass('resources/sass/app.scss', 'public/assets/frontend/common/css');


if (mix.inProduction()) {
    mix_admin.polyfill({
        enabled: true,
        useBuiltIns: "usage",
        targets: {"ie": 11},
        debug: true,
        corejs: 3, 
    });

    mix_frontend.polyfill({
        enabled: true,
        useBuiltIns: "usage",
        targets: {"ie": 11},
        debug: true,
        corejs: 3, 
     });
} 