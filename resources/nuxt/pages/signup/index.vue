<template>
  <signup-template @submit="submitSignup" />
</template>

<script>
export default {
  components: {
    SignupTemplate: () => import('~/components/templates/SignupTemplate'),
  },

  methods: {
    async submitSignup(values) {
      await this.$store
        .dispatch('auth/signup', { email: values.email, password: values.password })
        .then(() => {
          this.$router.push({ name: 'signup-select-users' })
        })
        .catch(error => {
          if (error.response && error.response.status === 422) {
          } else {
            // TODO: 共通のサーバーサイドエラー表示
            console.error(error)
          }
        })
    },
  },
}
</script>
