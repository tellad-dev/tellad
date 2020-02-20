<template>
  <v-footer light absolute class="footer">
    <v-col md="10" offset-md="1">
      <v-row no-gutters class="footer-links">
        <v-col md="8">
          <nuxt-link :to="{ name: '' }" class="footer-link">aa</nuxt-link>
          <nuxt-link :to="{ name: '' }" class="footer-link">bb</nuxt-link>
          <nuxt-link :to="{ name: '' }" class="footer-link">cc</nuxt-link>
          <nuxt-link :to="{ name: '' }" class="footer-link">dd</nuxt-link>
          <nuxt-link :to="{ name: '' }" class="footer-link">ee</nuxt-link>
          <nuxt-link :to="{ name: '' }" class="footer-link">ff</nuxt-link>
          <nuxt-link :to="{ name: '' }" class="footer-link">gg</nuxt-link>
          <nuxt-link :to="{ name: '' }" class="footer-link">hh</nuxt-link>
          <nuxt-link :to="{ name: '' }" class="footer-link">ii</nuxt-link>
        </v-col>
        <v-col md="3" offset-md="1" class="brand-title">
          Tellad<br />
          テラッド
        </v-col>
      </v-row>

      <v-row justify="center" no-gutters>
        <v-divider />
      </v-row>

      <v-row justify="space-between" no-gutters>
        <span>Copyright ©︎ 2020 Daft, inc. All Right Reserved.</span>
        <span>Daft.inc</span>
      </v-row>
    </v-col>
  </v-footer>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

@Component({
  components: {
    BaseButton: () => import('~/components/atoms/buttons/BaseButton'),
    BrandLogo: () => import('~/components/atoms/BrandLogo'),
  },
})
export default class TheFooter extends Vue {}
</script>

<style lang="stylus" scoped>
.footer
  padding 24px 40px 0 40px

  &-links
    min-height 200px

  &-link
    font-size 16px
    color black
    margin 0 16px

  .brand-title
    font-size 28px
    font-weight 700
</style>
