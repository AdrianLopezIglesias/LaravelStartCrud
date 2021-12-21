const mix = require('laravel-mix');

mix.webpackConfig({
	stats: {
		children: true
	},
	module: {
		rules: [
			{
				test: /\.pug$/,
				oneOf: [
					// this applies to `<template lang="pug">` in Vue components
					{
						resourceQuery: /^\?vue/,
						use: ['pug-plain-loader']
					},
					// this applies to pug imports inside JavaScript
					{
						use: ['raw-loader', 'pug-plain-loader']
					}
				]
			},
			{
        test: /\.coffee$/,
        loader: "coffee-loader",
			},
		]
	}
});
mix.js('resources/js/app.js', 'public/js')
    // .react()
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
