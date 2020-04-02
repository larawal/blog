/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import App from './components/App.vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

/**
 * Import Vue components
 */
import Archive from './components/Archive.vue';
import Article from './components/Article.vue';

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
      path: '/article/:slug',
      component: Article
  }
];

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const router = new VueRouter({ mode: 'history', routes: routes});
 //const app = new Vue(Vue.util.extend({ router }, App)).$mount('#article');
