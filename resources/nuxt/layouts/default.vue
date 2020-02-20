<template>
  <v-app light>
    <v-content>
      <TheHeader />

      <v-container>
        <nuxt />
      </v-container>
    </v-content>

    <TheFooter />
  </v-app>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

import TheHeader from '~/components/organisms/global/TheHeader'
import TheFooter from '~/components/organisms/global/TheFooter'

@Component({
  components: {
    TheHeader,
    TheFooter,
  },
})
export default class Default extends Vue {}
</script>
