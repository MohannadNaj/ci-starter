const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

elixir.config.sourcemaps = true;
elixir.config.appPath = 'application';
elixir.config.viewPath = 'resources/views';


elixir(mix => {
	/* Copy CSS */
		// Font-Awesome
		mix.copy('node_modules/components-font-awesome/fonts/', 'public/fonts/')
		// Bootstrap-Glyphicons
		.copy('node_modules/bootstrap-sass/assets/fonts/', 'public/fonts/')
	/* Copy JS */
		// Modernizer
		.copy('node_modules/npm-modernizr/modernizr.js', 'resources/assets/js/libs/')

	/* Combine JS */
		// Libs
		.scriptsIn('resources/assets/js/libs', 'public/js/all.js')
    	.webpack('app.js')
	
	/* Combine css */
		// Sass Entry Point
		.sass('app.scss');
    
    /* Versioning */
//        mix.version(['css/app.css', 'js/app.js', 'js/all.js']);

	/* browserSync - development only */
	    mix.browserSync(
	    	{
	    		proxy: 'http://127.0.0.1/ci_boilerplate/public/'
	    	});
});
