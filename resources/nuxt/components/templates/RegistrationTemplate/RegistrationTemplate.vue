<template>
  <div class="profile grey lighten-4">
    <profile-form :title="title" @submit="$listeners['submit']" />
  </div>
</template>

<script>
export default {
  components: {
    ProfileForm: () => import('~/components/organisms/forms/ProfileForm'),
  },
  props: ['title'],
}
</script>

<style scoped>
.profile {
  height: 100%;
  padding: 68px 0;
}
</style>
