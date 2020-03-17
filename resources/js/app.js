/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

/**
 * Import Vue components
 */
import Archive from './components/front/Archive.vue';
import Article from './components/front/Article.vue';

/**
 * Define a routes of Vue pages
 */
const routes = [
  {
      name: 'archive',
      path: '/',
      component: Archive
  },
  {
      name: 'article',
      path: '/:slug',
      component: Article
  }
];

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const router = new VueRouter({ mode: 'history', routes: routes});
 const app = new Vue(Vue.util.extend({ router }, Archive)).$mount('#article');
