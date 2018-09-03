/* подключим плагин */
var Encore = require('@symfony/webpack-encore');

Encore
   /* Установим путь куда будет осуществляться сборка */
   .setOutputPath('web/assets_prod/')// работает

   /* Укажем web путь до каталога web/build */
   .setPublicPath('/assets_prod')

   /* Каждый раз перед сборкой будем очищать каталог /build */
   .cleanupOutputBeforeBuild()

   /* --- Добавим основной JavaScript в сборку --- */
   .addEntry('scripts', './web/assets_dev/app.js')
   /* Добавим наш главный файл ресурсов в сборку */
   .addStyleEntry('styles', './web/assets_dev/app.css')
   /* Включим поддержку sass/scss файлов */

   // то что часто используется и не меняется
   .createSharedEntry('vendor', [
        './web/assets_dev/js/jquery/jquery-1.6.2.min.js',
		'./web/assets_dev/js/jquery/jquery-ui-1.8.6.custom.css',
		'./web/assets_dev/js/jquery/lightbox/css/jquery.lightbox-0.5.css',
		'./web/assets_dev/js/jquery/jquery-ui-1.8.6.custom.min.js',
		'./web/assets_dev/js/jquery/jquery.tools.min.js',
		'./web/assets_dev/js/default.js',
		'./web/assets_dev/js/escape.js',
		'./web/assets_dev/js/json_sans_eval.js',
		'./web/assets_dev/js/jquery/lightbox/jquery.lightbox-0.5.pack2.js',
		'./web/assets_dev/js/main.js'
    ])

	Encore.configureFilenames({
		images: '[path][name].[ext]',
		fonts: '[path][name].[ext]'
	})
	;
module.exports = Encore.getWebpackConfig();