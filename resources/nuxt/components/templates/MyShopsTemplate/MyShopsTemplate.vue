<template>
  <div>
    <section class="page-top">
      <h1 class="page-title">店舗管理</h1>
    </section>

    <div class="shops grey lighten-4">
      <v-card class="mx-auto shops-card">
        <v-card v-for="shop in shops" :key="shop.name" class="mx-auto mt-4" max-width="544" outlined>
          <v-list-item three-line>
            <v-list-item-content>
              <div class="overline mb-4" />
              <v-list-item-title class="headline mb-1">{{ shop.name }}</v-list-item-title>
              <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-avatar tile size="80" color="grey" />
          </v-list-item>

          <v-card-actions>
            <base-button text tile color="green" @click="this.$router.push({ name: 'mypage-shops-id' })"
              >編集</base-button
            >
            <base-button text tile color="red">削除</base-button>
          </v-card-actions>
        </v-card>
      </v-card>
    </div>
  </div>
</template>

<script>
export default {
  components: {
    BaseButton: () => import('~/components/atoms/buttons/BaseButton'),
  },
  data: () => ({
    shops: [
      {
        name: 'ShopA',
        phone: '00000001',
        address: '神戸市中央区',
      },
      {
        name: 'ShopB',
        phone: '00000002',
        address: '神戸市西区',
      },
      {
        name: 'ShopC',
        phone: '00000003',
        address: '神戸市北区',
      },
    ],
  }),
}
</script>

<style scoped></style>
