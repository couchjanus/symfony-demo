<template>
    <div class="shop">
      <header-section title="Customer Orders" lead="Customer Orders " :breadcrumbs="[{url:'orders', text:'Customer Orders'}]"></header-section>

      <main class="py-5">
        <div class="container py-5">
          <div class="row gx-lg-5">
            <profile-nav-bar></profile-nav-bar>
            <order-list></order-list>
          </div>
        </div>
      </main>

    </div>
</template>

<script>
import {HeaderSection} from '@/components/layouts';
import ProfileNavBar from '@/components/user/ProfileNavBar';
import OrderList from "../components/order/OrderList";

export default {
  name: "Orders",
  components:{
    HeaderSection,
    ProfileNavBar,
    OrderList
  }
}
</script>

<style scoped>

</style>