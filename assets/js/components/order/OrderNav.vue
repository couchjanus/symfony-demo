<template>
  <ul class="nav nav-pills rounded-lg-pill flex-column flex-lg-row nav-fill pills-lg-rounded list-separated-lg-secondary mb-5">
    <li class="nav-item my-1 my-lg-0">
      <router-link to="/checkout" class="nav-link py-3 small text-uppercase ">Address</router-link></li>

    <li class="nav-item my-1 my-lg-0">
      <router-link to="/review" class="nav-link py-3 small text-uppercase ">Order Review</router-link>
    </li>

  </ul>
</template>

<script>
export default {
  name: "OrderNav"
}
</script>

<style scoped>

</style>