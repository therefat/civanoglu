import './bootstrap';

import Alpine from 'alpinejs';
import jQuery from 'jquery';
window.$ = jQuery;
//
window.Alpine = Alpine;

Alpine.start();
// window.$ = window.jQuery = require('jquery');
$(document).ready(function() {
    // Your jQuery code here
    console.log('jQuery is working');
});
jQuery(window).scroll(function() {
    const scroll = jQuery(window).scrollTop();

    if (scroll >= 50) {
        jQuery('.sticky-header').addClass('sticky-header-active');
    } else {
        jQuery('.sticky-header').removeClass('sticky-header-active');
    }
});
