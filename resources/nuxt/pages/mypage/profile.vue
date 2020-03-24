<template>
  <profile-template title="プロフィール編集" @submit="submitProfile" />
</template>

<script>
export default {
  components: {
    ProfileTemplate: () => import('~/components/templates/ProfileTemplate'),
  },
  methods: {
    submitProfile(values) {
      // await authStore
      //  .update(values)
      //    .then(() => {
      //    })
      //    .catch(error => {
      //      console.error(error)
      //    })
      //   .finally(() => {
      //
      //    })
      console.log(values)
      this.$router.push({ name: 'mypage' })
    },
  },
}
</script>

<style scoped></style>
