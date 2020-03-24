<template>
  <select-users-template @submit="updateUsers" />
</template>

<script>
export default {
  components: {
    SelectUsersTemplate: () => import('~/components/templates/SelectUsersTemplate'),
  },
  methods: {
    async updateUsers(values) {
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
      await console.log(values)

      if (values.type === 'Guest') {
        this.$router.push({ name: 'mypage-profile' })
      }

      if (values.type === 'Host') {
        this.$router.push({ name: 'mypage' })
      }
    },
  },
}
</script>

<style scoped></style>
