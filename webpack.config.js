
/**
 * As our first step, we'll pull in the user's webpack.mix.js
 * file. Based on what the user requests in that file,
 * a generic config object will be constructed for us.
 */

require('./node_modules/laravel-mix/src/index');
require(Mix.paths.mix());

/**
 * Just in case the user needs to hook into this point
 * in the build process, we'll make an announcement.
 */

Mix.dispatch('init', Mix);

/**
 * Now that we know which build tasks are required by the
 * user, we can dynamically create a configuration object
 * for Webpack. And that's all there is to it. Simple!
 */

let WebpackConfig = require('./node_modules/laravel-mix/src/builder/WebpackConfig');

module.exports = new WebpackConfig({
  module: {
  	loaders: [
		{
		  loader: "babel-loader",
		  // Options to configure babel with
		  
		  // Skip any files outside of your project's `src` directory
		  include: [
		    path.resolve(__dirname, "resources/assets/js"),
		  ],
		  query: {
		    plugins: ['transform-runtime', "transform-object-rest-spread"],
		    presets: ['es2015', 'stage-0'],
		  }
		},
	]
  }
}).build();
