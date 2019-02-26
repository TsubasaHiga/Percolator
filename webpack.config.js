/** ------------------------------------------------------------
*
* webpack.config
*
* @description
    production に設定すると最適化
    development に設定するとソースマップ有効
*
* -------------------------------------------------------------*/
const webpack = require('webpack');
const config  = {
    watch   : true,
    mode    : "development",
    entry   : "./src/js/main.js",
    output  : {
        filename: "bundle.js"
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            presets: [
                                ['@babel/preset-env', {'modules': false}]
                            ]
                        }
                    }
                ]
            }
        ]
    }
};

module.exports = config;
