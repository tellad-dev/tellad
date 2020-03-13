<template>
  <v-footer color="primary darken-1" padless>
    <v-row justify="center" no-gutters>
      <v-btn v-for="link in links" :key="link" color="white" text rounded class="my-2">
        {{ link }}
      </v-btn>
      <v-col class="primary darken-2 py-4 text-center white--text" cols="12">
        <strong> &copy; 2020 Tellad 運営 株式会社 Daft</strong>
      </v-col>
    </v-row>
  </v-footer>
</template>

<script>
export default {
  data: () => ({
    drawer: false,
    links: ['お知らせ', '会社概要', 'プライバシーポリシー', 'お問い合わせ', '利用規約', 'よくある質問', '利用の流れ'],
  }),
}
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
