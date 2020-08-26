require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    methods: {
        test: function() {
            console.log("フォームが出力される！");
        }
    }
});