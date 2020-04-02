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
      console.log('formValues', values)
      await this.$store.dispatch('auth/signup', { email: values.email, password: values.password })
      await this.$router.push({ name: 'signup-select-users' })
    },
  },
}
</script>
