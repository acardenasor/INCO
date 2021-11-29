require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('prueba', require('./components/prueba.vue').default);
Vue.component('toggle', require('./components/toggle.vue').default);



const register = new Vue({
    el: '#register',
});

