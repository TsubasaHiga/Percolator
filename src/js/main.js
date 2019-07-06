'use strict';

import objectFitImages from 'object-fit-images';
import lazysizes from 'lazysizes';
import SweetScroll from 'sweet-scroll';
import { throttle, debounce } from 'throttle-debounce';
import 'nodelist-foreach-polyfill';
import 'swiper/dist/css/swiper.min.css';
import Swiper from 'swiper';
import { el, define } from './define';
import { getDeviceType, closetPolyfill } from './functions';

/* ---------------------------------------------------------------- */

// closet polyfill.
closetPolyfill();

let deviceType;

// SweetScroll ini.
let sweetScroll = '';
const sweetScrollIni = () => {
  if (getDeviceType() === 'lg') {
    let config = {
      offset : define.scroll_offset_lg
    };
    sweetScroll = new SweetScroll(config);
  } else {
    let config = {
      offset     : define.scroll_offset_sm,
      stopScroll : true
    };
    sweetScroll = new SweetScroll(config);
  }
};

window.addEventListener(
  'resize',
  debounce(300, () => {
    deviceType = getDeviceType();

    // スムーススクロール destroy.
    if (typeof sweetScroll !== 'undefined') {
      sweetScroll.destroy();
      sweetScrollIni();
    }

    if (define.bodyclass === 'blog') {
      page_header_bg();
    }
  }),
  false
);

window.addEventListener('load', () => {
  objectFitImages();

  // Get deviceType.
  deviceType = getDeviceType();

  // SweetScroll get hash.
  const hash = window.location.hash;
  const needsInitialScroll = document.getElementById(hash.substr(1)) != null;
  if (needsInitialScroll) {
    window.location.hash = '';
  }

  // SweetScroll ini.
  sweetScrollIni();

  // SweetScroll to scroll.
  if (needsInitialScroll) {
    sweetScroll.to(hash, { updateURL : 'replace' });
  }
});

// 横スクロールでｈeader動かす.
if (getDeviceType() === 'lg') {
  window.addEventListener('scroll', () => {
    el.header.style.left = -window.scrollX + 'px';
  });
}
