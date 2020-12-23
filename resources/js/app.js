import './bootstrap'
import Vue from 'vue'
import App from './components/ExampleComponent'
import axios from 'axios'

Vue.prototype.$http = axios

const vm = new Vue({
    'el': '#app',
    render: h => h(App)
})
