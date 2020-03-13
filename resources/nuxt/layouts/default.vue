<template>
  <v-app light>
    <the-header />
    <v-content>
      <nuxt />
    </v-content>
    <the-footer />
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
  data: () => ({}),
}
</script>
