import Vue from 'vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faChevronRight, faChevronDown, faPlusSquare } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Axios from "axios";

library.add(faChevronRight);
library.add(faChevronDown);
library.add(faPlusSquare);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.config.devtools = true;
Vue.config.performance = true;
Vue.config.productionTip = false;

Axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import App from './components/App.vue';

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    template: '<App/>',
    render: h => h(App)
});
