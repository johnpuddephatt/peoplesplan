
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

window.smoothScroll = require('./smoothscroll.min');
window.$ = require('./jquery-3.2.1.min.js');

require('./scroller');
require('./comments');
require('./tabs');

let navButton = document.querySelector('.navigation-account');
let navMenu = document.querySelector('.navigation-account-menu');

if(navButton && navMenu) {

  navMenu.addEventListener('focusout',()=>{
    setTimeout(function () {
      // navMenu.classList.remove('open');
    }, 100);
  });

  navButton.addEventListener('focusin',()=>{
    setTimeout(function () {
      navMenu.classList.add('open');
    },0);
  });
  navButton.addEventListener('focusout',()=>{
    setTimeout(function () {
      navMenu.classList.remove('open');
    },0);
  });

  navMenu.addEventListener('focusin',()=>{
    setTimeout(function () {
      navMenu.classList.add('open');
    },0);
  });

  navMenu.addEventListener('focusout',()=>{
    setTimeout(function () {
      navMenu.classList.remove('open');
    },0);
  });


  navMenu.addEventListener('click',(e)=>{

    if(e.target.getAttribute('href')) {
      // e.preventDefault();
    }
  });

}