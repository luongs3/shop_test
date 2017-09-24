let mix = require('laravel-mix');
let path = require('path');
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
function resolve (dir) {
    return path.join(__dirname, '..', dir)
}


mix.js('resources/assets/js/client/client.js', 'public/js/client.js')
    // .js('resources/assets/js/admin/admin.js', 'public/js/admin.js')
    // .sass('resources/assets/sass/admin.scss', 'public/css/admin.css')
    .sass('resources/assets/sass/client.scss', 'public/css/client.css')
    .sass('resources/assets/sass/app.scss', 'public/css/app.css')
    .webpackConfig({
        resolve: {
            alias: {
                assets: path.join(__dirname, 'resources/assets/js'),
                comps: path.join(__dirname, 'resources/assets/js/components'),
                admin: path.join(__dirname, 'resources/assets/js/admin'),
                client: path.join(__dirname, 'resources/assets/js/client')
            },
            modules: [
                path.resolve(__dirname, 'node_modules')
            ]
        }
    })
    .browserSync('shop.dev');
