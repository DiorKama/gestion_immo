require('./bootstrap');

window.$ = window.jQuery = require('jquery');
//window.Popper = require('popper.js');
require('bootstrap');

const MobileDetect = require('mobile-detect');
const md = new MobileDetect(window.navigator.userAgent);
const isMobile = md.mobile() !== null;
window.isMobile = isMobile;
