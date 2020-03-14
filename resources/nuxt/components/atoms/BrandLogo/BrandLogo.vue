<template>
  <div class="brand-title clickable" @click="top()">
    <v-img src="TelladLogo.png" alt="Tellad" width="70" />
  </div>
</template>

<script>
export default {
  methods: {
    top() {
      this.$router.push({ name: 'index' })
    },
  },
}
</script>

<style lang="stylus" scoped>
.brand-title
  font-size 35px
  font-weight 400
</style>
