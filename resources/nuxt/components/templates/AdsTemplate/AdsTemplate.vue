<template>
  <div>
    <section class="page-top">
      <h1 class="page-title">広告管理</h1>
    </section>

    <div class="ads grey lighten-4" style="position: relative">
      <section class="wrapper my-0">
        <v-row>
          <v-col sm="3" class="pa-4">
            <my-page-menu />
          </v-col>

          <v-col sm="9" class="pa-4">
            <v-card class="mx-auto ads-card" :elevation="0">
              <v-card v-for="ad in ads" :key="ad.name" class="mx-auto" max-width="544" outlined>
                <v-list-item three-line>
                  <v-list-item-content>
                    <div class="overline mb-4" />
                    <v-list-item-title class="headline mb-1">{{ ad.name }}</v-list-item-title>
                    <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
                  </v-list-item-content>

                  <v-list-item-avatar tile size="80" color="grey" />
                </v-list-item>

                <v-card-actions>
                  <base-button text tile color="green" @click="this.$router.push({ name: 'mypage-buisinesses-id' })"
                    >ビジネスを編集</base-button
                  >
                  <base-button text tile color="red" @click="this.$router.push({ name: 'mypage-ads-id' })"
                    >広告を追加</base-button
                  >
                </v-card-actions>
              </v-card>
            </v-card>
          </v-col>
        </v-row>
      </section>
    </div>
  </div>
</template>

<script>
export default {
  components: {
    MyPageMenu: () => import('~/components/organisms/MyPageMenu'),
    BaseButton: () => import('~/components/atoms/buttons/BaseButton'),
  },
  data: () => ({
    ads: [
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

<style scoped>
.ads {
  height: 100%;
  padding: 0 40px 48px;
}

.ads .ads-card {
  /* width: 550px; */
  /* margin-top: 20px; */
  padding: 30px 48px;
}
</style>
