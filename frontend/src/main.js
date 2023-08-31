import { createApp } from 'vue'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import App from './App.vue'
import './assets/fonts.css';


const app = createApp(App);
const options = {
};

app.use(Toast, options);
app.mount('#app');
