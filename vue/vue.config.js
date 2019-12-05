const webpack = require('webpack');
module.exports = {
    publicPath: '/',
    configureWebpack: {
        plugins: [
            new webpack.ProvidePlugin({
                $: "jquery",
                jQuery: "jquery",
                "windows.jQuery": "jquery"
            })
        ]
    },
    devServer: {
        open: true, 
        host: "0.0.0.0", 
        port: 8080,
        https: false,
        hotOnly: false
    }
}
