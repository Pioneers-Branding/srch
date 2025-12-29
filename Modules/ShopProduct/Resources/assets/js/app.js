import { InitApp } from '@/helpers/main'

import ProductFormOffcanvas from './components/ProductFormOffcanvas.vue'

const app = InitApp()

app.component('product-form-offcanvas', ProductFormOffcanvas)
app.mount('[data-render="app"]');
