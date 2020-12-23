import './bootstrap'
import Vue from 'vue'
import App from './components/ExampleComponent'
import axios from 'axios'
import moment from 'moment'

Vue.prototype.$http = axios
Vue.prototype.moment = moment

const vm = new Vue({
    'el': '#app',
    render: h => h(App)
})
