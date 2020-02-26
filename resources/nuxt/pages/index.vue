<template>
  <v-layout column justify-center align-center>
    <TopTemplate />
  </v-layout>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

import TopTemplate from '~/components/templates/TopTemplate'

@Component({
  components: {
    TopTemplate,
  },
})
export default class Index extends Vue {}
</script>
