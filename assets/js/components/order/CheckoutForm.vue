<template>
  <!-- Checkout Forms-->
  <section class="py-5">
    <div class="container py-5">
      <div class="row gy-5 gx-5">
        <div class="col-lg-8">

            <order-nav></order-nav>

          <div id="address">
            <form @submit.prevent="submit">
              <!-- Invoice Address-->
              <div class="bg-light rounded-pill px-4 py-3">
                <h6 class="mb-0">Invoice address</h6>
              </div>

              <div class="row gy-3 py-5">
                <div class="col-md-6">
                  <label class="form-label" for="firstname">First Name</label>
                  <input class="form-control" id="firstname" type="text" v-model="first_name" placeholder="Enter you first name">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="lastname">Last Name</label>
                  <input class="form-control" id="lastname" type="text" v-model="last_name" placeholder="Enter your last name">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="city">City</label>
                  <input class="form-control" id="city" type="text" v-model="shipping_city" placeholder="Your city">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="street">Street</label>
                  <input class="form-control" id="street" type="text" v-model="shipping_street" placeholder="Your street name">
                </div>


                <div class="col-md-6">
                  <label class="form-label" for="zip">ZIP</label>
                  <input class="form-control" id="zip" type="text" v-model="zip_code" placeholder="ZIP code">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="state">State</label>
                  <input class="form-control" id="state" type="text" v-model="shipping_state" placeholder="Your state">
                </div>

                <div class="col-md-12">
                  <label class="form-label" for="phone-number">Phone Number</label>
                  <input class="form-control" id="phone-number" type="tel" v-model="phone_number" placeholder="Your phone number">
                </div>

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
import {mapActions} from 'vuex';
import {OrderAction} from '@/store/types.actions';

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
      }
    }
  },
  methods:{
    async submit(){
      await this.checkout({
        cart_items: this.getProductsInCart,
        address: this.address
      }).finally(()=>{
        this.$router.replace({
          name: 'profile'
        })
      })
    },
    ...mapActions('order', {
      checkout: OrderAction.remote.MAKE_ORDER,
    })
  },
}
</script>

<style scoped>

</style>