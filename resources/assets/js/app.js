require('./bootstrap');

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: 'body',
    ready() {
    	console.warn('vue is ready!');	
    },
});

require('./modules/alert');
require('./modules/inputs');
