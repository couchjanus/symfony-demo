<template>

    <div class="bg-light text-center p-4 rounded-top-lg border border-bottom-0">

      <a class="d-inline-block" href="#">
        <img class="img-fluid rounded-circle img-thumbnail p-2 mb-3" src="/images/users/user.png" width="150" alt="...">
      </a>

      <h5>current User</h5>
      <p class="text-muted text-small">Developer</p>
    </div>

</template>

<script>
import {mapGetters} from "vuex";

export default {
  name: "ProfileHeader",
  computed: {
    ...mapGetters('auth', ['currentUser'])
  }
}
</script>

<style scoped>

</style>