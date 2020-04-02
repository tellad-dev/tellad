<template>
  <div>
    <section class="page-top">
      <h1 class="page-title">スペース管理</h1>
    </section>

    <div class="spaces grey lighten-4" style="position: relative">
      <section class="wrapper my-0">
        <v-row>
          <v-col sm="3" class="pa-4">
            <my-page-menu />
          </v-col>

          <v-col sm="9" class="pa-4">
            <v-card class="mx-auto spaces-card" :elevation="0">
              <v-card v-for="space in spaces" :key="space.name" class="mx-auto" max-width="544" outlined>
                <v-list-item three-line>
                  <v-list-item-content>
                    <div class="overline mb-4" />
                    <v-list-item-title class="headline mb-1">{{ space.name }}</v-list-item-title>
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
    spaces: [
      {
        name: 'スペースA',
        phone: '00000001',
        address: '神戸市中央区',
      },
      {
        name: 'スペースB',
        phone: '00000002',
        address: '神戸市西区',
      },
      {
        name: 'スペースC',
        phone: '00000003',
        address: '神戸市北区',
      },
    ],
  }),
}
</script>

<style scoped>
.spaces {
  height: 100%;
  padding: 0 40px 48px;
}

.spaces .spaces-card {
  /* width: 550px;
  margin-top: 20px; */
  padding: 30px 48px;
}
</style>
