/** ------------------------------------------------------------
*
* webpack.config
*
* @description
    production に設定すると最適化
    development に設定するとソースマップ有効
*
* -------------------------------------------------------------*/
const config  = {
    watch   : true,
    mode    : "development",
    entry   : "./src/js/main.js",
    output  : {
        filename: "bundle.js"
    }
};

module.exports = config;
