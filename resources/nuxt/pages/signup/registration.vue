<template>
  <registration-template title="プロフィール登録" @submit="submitProfile" />
</template>

<script>
export default {
  components: {
    RegistrationTemplate: () => import('~/components/templates/RegistrationTemplate'),
  },
  methods: {
    submitProfile(values) {
      console.log(values)
      this.$router.push({ name: 'index' })
    },
  },
}
</script>

<style scoped></style>
