import 'bootstrap';
import {createApp} from 'vue';

createApp({
    data() {
        return {
            count: 0
        }
    }
}).mount('#app')

require('./bootstrap');
