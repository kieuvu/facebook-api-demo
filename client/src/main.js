import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import Notifications from 'vue-notification';

import App from './App.vue';
import router from './router';
import store from './store';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.config.productionTip = false;

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueAxios, axios);
Vue.use(Notifications);

new Vue({
  router,
  store,
  render: function (h) { return h(App); }
}).$mount('#app');
