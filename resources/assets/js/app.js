require("babel-polyfill");
require('./bootstrap');

window.Vue = require('vue');

require('./load-components');

import {VueMasonryPlugin} from 'vue-masonry';
Vue.use(VueMasonryPlugin);

const app = new Vue({
    el: '#app',

    data(){
        return {
            mobileMenuOpen: false,
            section: 'dashboard'
        }
    },
    methods: {
        toggleMobileMenu(){
            this.mobileMenuOpen = !this.mobileMenuOpen;
        },
        changesection(section){
            this.mobileMenuOpen = false;
            this.section = section;
        }
    }
});