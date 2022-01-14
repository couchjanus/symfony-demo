<template>
<div>
  <h1>Home Page</h1>
  <hello-vue message="Welcome to my Site"></hello-vue>
</div>
</template>

<script>
import HelloVue from "../components/HelloVue";
export default {
  name: "Home",
  components:{
    HelloVue
  }
}
</script>

<style scoped>

</style>