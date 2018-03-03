var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
     .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
     .addEntry('js/app', './assets/js/app.js')
     .addStyleEntry('css/app', './assets/css/app.scss')

    // uncomment if you use Sass/SCSS files
     .enableSassLoader(function(options) {
         // https://github.com/webpack-contrib/less-loader#examples
         // http://lesscss.org/usage/#command-line-usage-options
          options.relativeUrls = false;
     })

    // uncomment for legacy applications that require $/jQuery as a global variable
     .autoProvidejQuery()
    .enableLessLoader(function(options) {
        // https://github.com/webpack-contrib/less-loader#examples
        // http://lesscss.org/usage/#command-line-usage-options
         options.relativeUrls = false;
    })
;

module.exports = Encore.getWebpackConfig();
