import _ from 'lodash';
window._ = _;

import axios from 'axios';
import router from './router'
import bootstrap from 'bootstrap/dist/js/bootstrap'
window.axios = axios;
window.router = router;
window.bootstrap = bootstrap;

window.axios.defaults.withCredentials = true

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';