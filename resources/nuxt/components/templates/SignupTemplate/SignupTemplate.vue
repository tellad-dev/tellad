<template>
  <div class="signup grey lighten-4" style="position: relative">
    <section class="wrapper my-0">
      <signup-form @submit="$listeners['submit']" />
    </section>
  </div>
</template>

<script>
export default {
  components: {
    SignupForm: () => import('~/components/organisms/forms/SignupForm'),
  },
}
</script>

<style scoped>
.signup {
  height: 100%;
  padding: 68px 0 0 0;
}
</style>
