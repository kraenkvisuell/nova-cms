window.$ = window.jQuery = require('jquery');
window.bodyScrollLock = require('body-scroll-lock');
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);
