var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var extractCSS = new ExtractTextPlugin('stylesheets/[name].css');
var CopyWebpackPlugin = require('copy-webpack-plugin');
var path = require('path');
var merge = require('webpack-merge');

const devBuild = process.env.NODE_ENV !== 'production';
const nodeEnv = devBuild ? 'development' : 'production';


var config = {
    entry: {
        main: './assets/js/main.js',
        // Separate vendor in their own bundles to speed up webpack --watch
        'vendor': [
            'jquery',
            'lodash',
        ],
    },
    output: {
        publicPath: '/assets/build/',
        path: './web/assets/build/',
        filename: '[name].js'
    },
    resolve: {
        extensions: ['', '.js', '.jsx']
    },
    module: {
        loaders: [
            { test: require.resolve('jquery'), loader: 'expose?$!expose?jQuery' },
            { test: /\.js?$/, loader: 'babel-loader', exclude: /node_modules/ },
            { test: /\.jsx?$/, loader: 'babel-loader', exclude: /node_modules/ },
            { test: /\.(woff|woff2)(\?v=\d+\.\d+\.\d+)?$/, loader: 'url?limit=10000&mimetype=application/font-woff'},
            { test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/, loader: 'url?limit=10000&mimetype=application/octet-stream'},
            { test: /\.eot(\?v=\d+\.\d+\.\d+)?$/, loader: 'file'},
            { test: /\.svg(\?v=\d+\.\d+\.\d+)?$/, loader: 'url?limit=10000&mimetype=image/svg+xml' },
            { test: /\.gif$/, loader: 'url-loader?limit=100000' },
            { test: /\.png$/, loader: 'url-loader?limit=100000' },
            { test: /\.jpg$/, loader: 'file-loader' },
        ]
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin({
            name: 'vendor',
            chunks: ['main'],
            filename: 'vendor.js',
            minChunks: Infinity
        }),
        new webpack.ProvidePlugin({
            _: 'lodash',
            $: 'jquery',
            'jQuery'              : 'jquery',
            'window.jQuery'       : 'jquery',
        }),
        new CopyWebpackPlugin([
            { from: './assets/img', to: './../img' },
        ]),
        new webpack.ContextReplacementPlugin(/moment[\\\/]locale$/, /^\.\/(en|fr|es|nl|ru|da|nn|nb|de|it)$/),
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: JSON.stringify(nodeEnv),
            },
        }),

    ]
};

if (devBuild) {
    console.log('Webpack dev build');
    module.exports = merge(config, {
        devtool: 'eval-source-map',
        module: {
            loaders: [
                { test: /\.scss$/i, loaders: ['style', 'css','sass']},
                { test: /\.css$/i, loaders: ['style', 'css','sass']}
            ],
        },
    });
} else {
    console.log('Webpack production build');
    module.exports = merge(config, {
        module: {
            loaders: [
                { test: /\.scss$/i, loader: extractCSS.extract(['css','sass'])},
                { test: /\.css$/i, loader: extractCSS.extract(['css'])}
            ]
        },
        plugins: [
            extractCSS,
            new webpack.optimize.DedupePlugin(),
            new webpack.optimize.UglifyJsPlugin({
                compress: {
                    warnings: false
                }
            }),
            new webpack.DefinePlugin({
                // See https://reactjsnews.com/how-to-make-your-react-apps-10x-faster
                // I find unbelievable that this gives us a gain, but...
                'process.env.NODE_ENV': JSON.stringify('production')
            }),
        ]
    });
}
