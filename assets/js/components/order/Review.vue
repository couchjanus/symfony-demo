<template>
  <section class="py-5">
    <div class="container py-5">
      <div class="row gy-5 gx-5">

        <div class="col-lg-8">

          <order-nav></order-nav>

          <div id="order-review">

            <div class="cart-outer mb-5">

              <div class="cart-inner">

                  <div class="border-top border-bottom py-2">
                    <div class="row text-uppercase">
                      <div class="col-6"><strong class="small">Product</strong></div>
                      <div class="col-2"> <strong class="small">Price</strong></div>
                      <div class="col-2"> <strong class="small">Quantity</strong></div>
                      <div class="col-2 text-end"><strong class="small">Unit price</strong></div>
                    </div>
                  </div>

                  <div class="py-4 border-bottom"  v-for="(cartItem, index) in getProductsInCart" :key="index">

                    <div class="row d-flex align-items-center bord">

                      <div class="col-6">
                        <div class="d-flex align-items-center"><img class="img-fluid" :src="'/images/products/' + cartItem.cover" alt="..." width="70">
                          <div class="ms-3"><a href="/detail">
                            <h6 class="mb-0 text-dark fw-normal">{{cartItem.name}}</h6></a></div>
                        </div>

                      </div>

                      <div class="col-2"><span>${{cartItem.price}}</span></div>
                      <div class="col-2"><span>{{cartItem.quantity}}</span></div>
                      <div class="col-2 text-end"><span>${{cartItem.price*cartItem.quantity}}</span></div>
                    </div>

                  </div>

              </div>
            </div>

          </div>

        </div>

        <div class="col-lg-4">
            <order-summary></order-summary>
        </div>

      </div>

    </div>
  </section>
</template>

<script>
import OrderSummary from '@/components/order/OrderSummary';
import OrderNav from "./OrderNav";

import {mapGetters} from 'vuex';

export default {
  name: "Review",
  components: {
    OrderSummary,
    OrderNav
  },
  computed: {
    ...mapGetters('cart', [
        'getProductsInCart'
    ])
  }
}
</script>

<style scoped>

</style>