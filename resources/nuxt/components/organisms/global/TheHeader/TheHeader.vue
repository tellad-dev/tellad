<template>
  <v-app-bar color="white" light dense>
    <BrandLogo />

    <v-spacer />

    <BaseButton text>
      ログイン
    </BaseButton>

    <BaseButton text>
      会員登録
    </BaseButton>
  </v-app-bar>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

@Component({
  components: {
    BaseButton: () => import('~/components/atoms/buttons/BaseButton'),
    BrandLogo: () => import('~/components/atoms/BrandLogo'),
  },
})
export default class TheHeader extends Vue {}
</script>

<style lang="stylus"></style>
