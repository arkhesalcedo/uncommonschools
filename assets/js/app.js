import Vue from 'vue';

import Axios from 'axios';

import VueScrollReveal from 'vue-scroll-reveal';
 
Vue.use(VueScrollReveal);

window.Vue = Vue;

window.axios = Axios;

Vue.component('ucs-banner', require('./components/Banner.vue'));

Vue.component('ucs-nav', require('./components/Nav.vue'));

Vue.component('ucs-footer', require('./components/Footer.vue'));

Vue.component('ucs-3-blocks-across', require('./components/ThreeBlocksAcross.vue'));

Vue.component('ucs-cta', require('./components/CTA.vue'));

Vue.component('ucs-social', require('./components/Social.vue'));

Vue.component('ucs-steps', require('./components/Steps.vue'));

Vue.component('ucs-profiles', require('./components/Profiles.vue'));

Vue.component('ucs-justice', require('./components/Justice.vue'));

Vue.component('ucs-video', require('./components/Video.vue'));

let app = new Vue({
	el: '#app'
});