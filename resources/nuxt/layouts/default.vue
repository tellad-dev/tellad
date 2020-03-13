<template>
  <v-app id="app">
    <TheHeader />
    <v-content>
      <v-container class="grey lighten-5 fill-height" fluid>
        <nuxt />
      </v-container>
    </v-content>
    <TheFooter />
  </v-app>
</template>

<script>
import TheHeader from '~/components/organisms/global/TheHeader/TheHeader.vue'
import TheFooter from '~/components/organisms/global/TheFooter/TheFooter.vue'
export default {
  components: {
    TheHeader,
    TheFooter,
  },
}
</script>
