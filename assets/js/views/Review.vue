<template>
  <div class="checkout">
    <header-section title="Order Review" lead="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt." :breadcrumbs="[{url:'review', text:'Order Review cart'},]"></header-section>
    <section class="py-5">
      <div class="container py-4">
        <div class="row gx-5 gy-5">
          <review-form></review-form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import {HeaderSection} from '@/components/layouts';
import ReviewForm from "@/components/order/Review";
export default {
  name: "Review",
  components: {
    HeaderSection,
    ReviewForm
  }
}
</script>

<style scoped>

</style>