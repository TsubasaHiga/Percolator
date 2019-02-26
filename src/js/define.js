'use strict';

/** ------------------------------------------------------------
*
* 変数
*
* @description 変数及び基本要素の指定を行います
*
* -------------------------------------------------------------*/
export const define = {
    breakpoint : 767
};
export const el = {
    html        : document.getElementsByTagName('html')[0],
    body        : document.getElementsByTagName('body')[0],
    header      : document.getElementsByTagName('header')[0],
    header_nav  : document.querySelectorAll('.l-nav__link'),
    page        : document.getElementsByClassName('.l-page'),
    headerLogo  : document.getElementsByClassName('.l-header__logo'),
    nav         : document.getElementsByClassName('.l-nav'),
    content     : document.getElementsByClassName('.l-content'),
    main        : document.getElementsByClassName('.l-main'),
    footer      : document.getElementsByClassName('.l-footer'),
    footerNavLi : document.getElementsByClassName('.l-footer__nav--item')
};
