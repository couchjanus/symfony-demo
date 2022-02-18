<template>
  <!-- Checkout Forms-->
  <section class="py-5">
    <div class="container py-5">
      <div class="row gy-5 gx-5">
        <div class="col-lg-8">

            <order-nav></order-nav>

          <div id="address">
            <form @submit.prevent="submit">
              <!-- Invoice Shipping-->
              <div class="bg-light rounded-pill px-4 py-3">
                <h6 class="mb-0">Choose Shipping Method</h6>
              </div>
              <div class="row gy-3 py-5">

                <div class="form-check col-md-3 mb-4" v-for="(ship, index) in shipping_methods" :key="index">
                  <input class="form-check-input" :value="ship.value" :id="'option'+index" type="radio" v-model="shipping_price" @change="changeShippingMethod(ship)">
                  <label class="form-check-label" :for="'option'+index"><strong>{{ship.name}}</strong></label>
                </div>

              </div>
              <!-- Invoice Address-->
              <div class="bg-light rounded-pill px-4 py-3">
                <h6 class="mb-0">Invoice address</h6>
              </div>

              <div class="row gy-3 py-5" v-show="shipping_price != 0">
                <div class="col-md-6">
                  <label class="form-label" for="firstname">First Name</label>
                  <input class="form-control" id="firstname" type="text" v-model="address.first_name" placeholder="Enter you first name">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="lastname">Last Name</label>
                  <input class="form-control" id="lastname" type="text" v-model="address.last_name" placeholder="Enter your last name">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="city">City</label>
                  <input class="form-control" id="city" type="text" v-model="address.shipping_city" placeholder="Your city">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="street">Street</label>
                  <input class="form-control" id="street" type="text" v-model="address.shipping_street" placeholder="Your street name">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="zip">ZIP</label>
                  <input class="form-control" id="zip" type="text" v-model="address.zip_code" placeholder="ZIP code">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="state">State</label>
                  <input class="form-control" id="state" type="text" v-model="address.shipping_state" placeholder="Your state">
                </div>
              </div>

                <div class="col-md-12">
                  <label class="form-label" for="phone-number">Phone Number</label>
                  <input class="form-control" id="phone-number" type="tel" v-model="address.phone_number" placeholder="Your phone number">
                </div>



              <div class="d-flex justify-content-between flex-column flex-lg-row">

                <router-link class="btn btn-outline-secondary px-sm-5 my-1" to="/cart"> <i class="fas fa-angle-left me-2"></i>Back to basket</router-link>

                <button class="btn btn-primary px-sm-5 my-1" type="submit">Place Order <i class="fas fa-angle-right ms-2"></i></button>

              </div>
            </form>
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
import {mapActions, mapGetters} from 'vuex';
import {OrderAction, CartAction} from '@/store/types.actions';

export default {
  name: "CheckoutForm",
  components: {
    OrderSummary,
    OrderNav
  },
  data(){
    return{
      address:{
        first_name:'',
        last_name:'',
        shipping_street: '',
        shipping_state: '',
        shipping_city: '',
        phone_number:'',
        zip_code:''
      },
      shipping_methods: [
        {name: 'No shipping', value: 0},
        {name: 'Method 1', value: 10},
        {name: 'Method 2', value: 20},
        {name: 'Method 3', value: 40}
      ],
      shipping_price: 0,
      shipping_method: ''
    }
  },
  methods:{
    changeShippingMethod(ship){
      this.shipping_method = ship.name;
      this.setSipping(ship.value);

    },
    async submit(){
      await this.checkout({
        cart_items: this.getProductsInCart,
        address: this.address,
        order_info: {
          total_price: this.getTotalPrice,
          shipping_price: this.shipping_price,
          shipping_method: this.shipping_method
        }
      }).finally(()=>{
        this.$router.replace({
          name: 'profile'
        })
      })
    },
    ...mapActions('order', {
      checkout: OrderAction.remote.MAKE_ORDER,
    }),
    ...mapActions('cart', {
      setSipping: CartAction.SET_CART_SHIPPING,
    })
  },

  computed:{
    ...mapGetters('cart', ['getTotalPrice', 'getProductsInCart'])
  }
}
</script>

<style scoped>

</style>