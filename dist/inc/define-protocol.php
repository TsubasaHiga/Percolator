<?php
/** ------------------------------------------------------------
*
* プロトコルに関する設定
*
* -------------------------------------------------------------
*/

// http関連の値を設定
define('HTTP_PROTCOL', 'http://');
define('HTTPS_PROTCOL', 'https://');
define('HTTP_PATH', realpath(dirname(__FILE__)));
define('ROOT_PATH', realpath(dirname(HTTP_PATH)));
define('SITEROOT', str_replace(DIRECTORY_SEPARATOR, '/', str_replace(str_replace('/', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT']), '', ROOT_PATH)) . '/');


// httpとhttpsでSITEURLのプロトコルを自動変更
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    define('SITEURL', HTTPS_PROTCOL . $_SERVER['HTTP_HOST'] . SITEROOT);
    define('PAGEURL', HTTPS_PROTCOL . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
} else {
    define('SITEURL', HTTP_PROTCOL . $_SERVER['HTTP_HOST'] . SITEROOT);
    define('PAGEURL', HTTP_PROTCOL . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
}
