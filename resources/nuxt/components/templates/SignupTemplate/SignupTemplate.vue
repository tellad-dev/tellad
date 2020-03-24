<template>
  <div class="signup grey lighten-4">
    <signup-form @submit="$listeners['submit']" />
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
  padding: 68px 0;
}
</style>
