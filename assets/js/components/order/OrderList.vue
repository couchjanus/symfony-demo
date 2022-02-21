<template>
  <div class="col-lg-8 col-xl-9">
    <div class="table-responsive-md">
      <table class="table table-hover">
        <thead>
        <tr>
          <th class="border-light border-top">Order</th>
          <th class="border-light border-top">Date</th>
          <th class="border-light border-top">Total</th>
          <th class="border-light border-top">Status</th>
          <th class="border-light border-top">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(item, index) in getOrders" :key="index">
          <th># {{item.id}}</th>
          <td>{{new Date(item.created_at).toLocaleString()}}</td>
          <td>${{item.total_price}}</td>
          <td><span class="badge bg-info">1</span></td>
          <td>
            <router-link class="btn btn-primary btn-sm" :to="`/order/${item.id}`">View</router-link>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import {OrderAction} from "../../store/types.actions";

export default {
  name: "OrderList",
  mounted() {
    this.fetchOrders()
  },
  methods:{
    ...mapActions('order', {
      fetchOrders: OrderAction.remote.FETCH_ALL
    })
  },
  computed:{
    ...mapGetters('order', ['getOrders'])
  }
}
</script>

<style scoped>

</style>