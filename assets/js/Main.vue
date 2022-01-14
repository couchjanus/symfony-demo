<template>
<div>
  <h2 class="hello">{{ message }}</h2>
  <hello></hello>
</div>
</template>

<script>
export default {
  name: "Main",
  data() {
    return {
      message: "Welcome to external component"
    }
  }
}
</script>

<style scoped>
  .hello{
    color: red;
  }
</style>