<template>
  <v-layout column justify-center align-center>
    <login-template />
  </v-layout>
</template>

<script>
import LoginTemplate from '~/components/templates/LoginTemplate/LoginTemplate.vue'

export default {
  components: {
    LoginTemplate,
  },
}
</script>
