<template>
  <div class="brand-title" @click="top()">
    Tellad
  </div>
</template>

<script lang="ts">
import { Vue } from 'vue-property-decorator'

export default class BrandLogo extends Vue {
  top(): void {
    this.$router.push({ name: 'index' })
  }
}
</script>

<style lang="stylus" scoped>
.brand-title
  font-size 35px
  font-weight 400
</style>
