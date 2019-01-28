'use strict';

/** ------------------------------------------------------------
*
* module import
*
* @url InstantClick        http://instantclick.io/
* @url objectFitImages     https://github.com/bfred-it/object-fit-images
* @url lazysizes           https://github.com/aFarkas/lazysizes
* @url throttle-debounce   https://www.npmjs.com/package/throttle-debounce
* @url swiper              https://www.npmjs.com/package/swiper
*
* -------------------------------------------------------------*/
import InstantClick from "instantclick";
import objectFitImages from "object-fit-images";
import lazysizes from "lazysizes";
import { throttle, debounce } from 'throttle-debounce';
import Swiper from 'swiper';

InstantClick.init();
objectFitImages();





/** ------------------------------------------------------------
*
* 変数
*
* @description 変数及び基本要素の指定を行います
*
* -------------------------------------------------------------*/
//const $ = require('jquery');
const breakpoint = 767;
const el = {
    html        : document.getElementsByTagName('html')[0],
    body        : document.getElementsByTagName('body')[0],
    header      : document.getElementsByTagName('header')[0],
    page        : document.getElementsByClassName('.l-page'),
    headerLogo  : document.getElementsByClassName('.l-header__logo'),
    nav         : document.getElementsByClassName('.l-nav'),
    content     : document.getElementsByClassName('.l-content'),
    main        : document.getElementsByClassName('.l-main'),
    footer      : document.getElementsByClassName('.l-footer'),
    footerNavLi : document.getElementsByClassName('.l-footer__nav--item')
};





/** ------------------------------------------------------------
*
* evnt
*
* -------------------------------------------------------------*/
// event load
window.addEventListener('load', function() {
    let deviceType = get_deviceType();

    let mySwiper = new Swiper ('.swiper-container', {
        direction       : 'horizontal',
        slidesPerView   : 1,
        spaceBetween    : 30,
        loop            : true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
});

// event resize - debounce
window.addEventListener('resize', debounce(300, function() {
    let deviceType = get_deviceType();
}), false);





/** ------------------------------------------------------------
*
* get_deviceType
*
* @return string 'lg' or 'sm'
* @description breakpointとウインドウサイズを比較してlgかsmか返します
*
* -------------------------------------------------------------*/
function get_deviceType() {
    let windowWidth = window.innerWidth;
    let deviceType  = ( windowWidth > breakpoint ) ? 'lg' : 'sm';
    console.log(deviceType);
    return deviceType;
}





/** ------------------------------------------------------------
*
* ハンバーガーメニュー
*
* -------------------------------------------------------------*/
(function() {

    el.html.classList.remove('is-nav-active');

    // ハンバーガーのボタン
    let btn = document.querySelector('.l-hmb');
    let bg  = document.querySelector('.l-bg');
    let isActive  = false;

    let show = function() {
        isActive = true;
        el.html.classList.add('is-nav-active');
    };
    let hide = function() {
        isActive = false;
        el.html.classList.remove('is-nav-active');
    };

    btn.addEventListener('click', function(e) {
        isActive ? hide() : show();
    });
    bg.addEventListener('click', function(e) {
        isActive ? hide() : show();
    });

    window.addEventListener('resize', function() {
        if (isActive) {
            hide();
        }
    });

}());





/** ------------------------------------------------------------
*
* アコーディオン
*
* -------------------------------------------------------------*/
(function() {

    let accordion = document.querySelectorAll('.js-accordion');
    let isActive  = false;

    let show = function(e) {
        isActive = true;
        e.classList.add('is-open');
    };
    let hide = function(e) {
        isActive = false;
        e.classList.remove('is-open');
    };

    accordion.forEach(function(e) {
        e.addEventListener('click', function() {
            isActive ? hide(e) : show(e);
        }, false);
    });

}());
