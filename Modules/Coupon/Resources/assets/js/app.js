import { InitApp } from '@/helpers/main'

import CouponFormOffcanvas from './components/CouponFormOffcanvas.vue'

const app = InitApp()

app.component('coupon-form-offcanvas', CouponFormOffcanvas)

app.mount('[data-render="app"]');
