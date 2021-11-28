require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('prueba', require('./components/prueba.vue').default);



const register = new Vue({
    el: '#register',
});
