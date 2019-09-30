require('./bootstrap');

import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import Search from './src/Components/Search.vue';
import locale from 'element-ui/lib/locale/lang/en'

Vue.use(ElementUI, { locale });

const app = new Vue({
  el: '#app',
  components: {
    search: Search
  }
});
