<template>
  <div class="shop">
    <header-section title="Customer Profile" lead="Customer Profile " :breadcrumbs="[{url:'profile', text:'Customer Profile'}]"></header-section>

    <main class="py-5">
      <div class="container py-5">
        <div class="row gx-lg-5">
         <profile-nav-bar></profile-nav-bar>

        </div>
      </div>
    </main>

  </div>
</template>

<script>
import {HeaderSection} from '@/components/layouts';
import ProfileNavBar from '@/components/user/ProfileNavBar';
export default {
  name: "Profile",
  components:{
    HeaderSection,
    ProfileNavBar
  }
}
</script>

<style scoped>

</style>