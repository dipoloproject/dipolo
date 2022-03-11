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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

//  COMPILACION: CSS y JS
    mix.styles([
                    'resources/css/admin.css',
                    'resources/css/AdminLTE.css',
                    'resources/css/AdminLTE.min.css',
                    'resources/css/bootstrap.min.css',
                    'resources/css/dataTables.bootstrap.min.css',
                    'resources/css/font-awesome.min.css',
                    'resources/css/ionicons.min.css',
                    'resources/css/sweetalert2.css',
                    'resources/css/sweetalert2.min.css',
                    'resources/css/treeview.css',
                    'resources/css/skins/_all-skins.min.css'
    ], 'public/css/all.css')
    .scripts([
                
                'resources/js/jquery.min.js',
                'resources/js/bootstrap.min.js',        
                'resources/js/jquery.slimscroll.min.js',        
                'resources/js/fastclick.js',
                'resources/js/adminlte.min.js',
                'resources/js/sweetalert2.all.min.js',
                'resources/js/jquery.dataTables.min.js',
                'resources/js/dataTables.bootstrap.min.js',
                'resources/js/admin-ajax.js',
                'resources/js/demo.js',
                'resources/js/app_config.js',
                'resources/js/bootstrap.js'
    ], 'public/js/all.js');
//

