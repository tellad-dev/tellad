<template>
  <v-app light>
    <v-content>
      <TheHeader />
      <nuxt />
    </v-content>

    <v-snackbar v-model="snackbar">
      {{ snackbar }}
      <v-btn color="white" text @click="snackbar = false">
        Close
      </v-btn>
    </v-snackbar>

    <TheFooter />
  </v-app>
</template>

<script>
import TheHeader from '~/components/organisms/global/TheHeader'
import TheFooter from '~/components/organisms/global/TheFooter'

export default {
  components: {
    TheHeader,
    TheFooter,
  },
  data: () => ({
    snackbar: false,
  }),
}
</script>
