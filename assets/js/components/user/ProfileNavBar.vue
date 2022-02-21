<template>
<div class="col-xl-3 col-lg-4">
  <profile-icons></profile-icons>

  <profile-header></profile-header>

  <nav class="list-group">
    <router-link class="list-group-item list-group-item-action d-flex justify-content-between align-items-center rounded-0" v-for="(item, index) in nav_list_items"  :key="index" :to="item.to" aria-current="true">
       <span class="fw-normal text-sm text-dark py-1">
         <svg class="svg-icon me-2 svg-icon-sm svg-icon-heavy">
             <use :xlink:href="item.icon"> </use>
         </svg>{{item.title}}
       </span>
      <small v-show="item.badge" class="badge rounded-pill bg-primary">{{getOrderCount}}</small>
    </router-link>
  </nav>

</div>
</template>
<script>
import ProfileIcons from "./ProfileIcons";
import ProfileHeader from "./ProfileHeader";
import {mapGetters} from 'vuex';
export default {
  name: "ProfileNavBar",
  components:{
    ProfileIcons,
    ProfileHeader,
  },
  data(){
    return{ nav_list_items:[
      { to: '/orders', icon:'#shopping-bag-1',  badge: true, title: 'Orders' },
      { to: '/profile', icon:'#user-1',  badge: false,  title: 'Profile' },
      { to: '/address', icon: '#map-marker-1', badge: false, title: 'Addresses' },
    ]}
  },

  computed:{
    ...mapGetters('order', ['getOrderCount'])
  },

}
</script>

<style scoped>

</style>