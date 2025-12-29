import { InitApp } from '@/helpers/main'
import VideoFormOffcanvas from './components/VideoFormOffcanvas.vue'

const app = InitApp()

app.component('video-form-offcanvas', VideoFormOffcanvas)



app.mount('[data-render="app"]');
