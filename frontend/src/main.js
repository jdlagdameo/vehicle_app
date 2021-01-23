import Vue from 'vue'
import App from './App.vue'

Vue.config.productionTip = false

import axios from 'axios'
import VueAxios from 'vue-axios'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import './bootstrap.min.css';


Vue.use(VueAxios, axios)

Vue.use(BootstrapVue);

Vue.use(IconsPlugin);

new Vue({
  render: h => h(App),
  // components: [NavbarComponent]
}).$mount('#app')
