<template>
  <v-app-bar color="white" light>
    <BrandLogo />

    <v-spacer />

    <BaseButton text> Telladとは </BaseButton>
    <BaseButton text>
      利用の流れ
    </BaseButton>
    <BaseButton text>
      よくある質問
    </BaseButton>
    <BaseButton text>
      メッセージ
    </BaseButton>
    <BaseButton text>
      マイページ
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

<style></style>
