require('./bootstrap');

require('alpinejs');

require('./Dev/live.js');

let elem = $('.alert-success');

setTimeout(() =>{
    elem.fadeOut("slow");
},2000)
