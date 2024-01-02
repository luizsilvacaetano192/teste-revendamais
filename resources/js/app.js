import './bootstrap';
import {createApp} from 'vue';
import App from './components/App.vue';
import { VueMaskDirective } from 'v-mask';

const vMaskV2 = VueMaskDirective;
const vMaskV3 = {
    beforeMount: vMaskV2.bind,
    updated: vMaskV2.componentUpdated,
    unmounted: vMaskV2.unbind
};

const app = createApp(App).directive('mask', vMaskV3);

app.mount('#app')
