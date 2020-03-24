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
      // await authStore
      // .signUp({ email: values.email, password: values.password })
      //   .then(() => {
      //     this.$router.push({ name: 'signup/select-user' })
      //   })
      //   .catch(error => {
      //     // エラー処理
      //     console.log(error)
      //   })
      //   .finally(() => {
      //     //
      //   })
      await console.log('formValues', values)
      // this.$router.push({ name: 'signup/select-user' })
    },
  },
}
</script>
