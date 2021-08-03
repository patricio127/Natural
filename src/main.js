import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import AnimateCSS from 'animate.css';

const server_url = 'https://veggie-shop.000webhostapp.com/reviews-api/';
console.log(server_url);

Vue.config.productionTip = false

Vue.filter('mayuscula', function(texto){
    if(!texto){
        return'';
    }
    return texto.charAt(0).toUpperCase()+texto.slice(1);
});
Vue.filter('formatoPrecio', function(numero){
    if(!numero){
        return'';
    }
    return `$ ${numero}`;
});

new Vue({
  router,
  vuetify,
  AnimateCSS,
  render: h => h(App)
}).$mount('#app')
