import Vue from 'vue'
import './plugins/axios'
import App from './App.vue'
import router from './router'
import store from './store'
import $ from 'jquery'
import qs from 'qs'

const account = sessionStorage.getItem("account");

Vue.config.productionTip = false;
Vue.prototype.bus = new Vue();
Vue.prototype.account = account;
Vue.prototype.ajax = (api, param) => {
  let params = account ? { account: JSON.parse(account), param } : { account: { code: 0 }, param };
  return axios.post(`${process.env.VUE_APP_API}${api}`, qs.stringify(params)).then(res => Promise.resolve(res.data));
}
axios.defaults.timeout = 5000 // 请求超时
axios.defaults.baseURL = '/api/'  // api 即上面 vue.config.js 中配置的地址
// axios.defaults.withCredentials = true
new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
