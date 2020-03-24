<template>
  <div class="select-users grey lighten-4">
    <select-users-type-form @submit="$listeners['submit']" />
  </div>
</template>

<script>
export default {
  components: {
    SelectUsersTypeForm: () => import('~/components/organisms/forms/SelectUsersTypeForm'),
  },
}
</script>

<style scoped>
.select-users {
  height: 100%;
  padding: 68px 0;
}
</style>
