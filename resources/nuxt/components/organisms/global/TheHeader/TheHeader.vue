<template>
  <v-app-bar app color="primary darken-2" dark>
    <brand-logo />

    <v-spacer />

    <base-button text @click="$router.push({ name: 'about' })"> Telladとは </base-button>
    <base-button text @click="$router.push({ name: 'mypage' })">
      利用の流れ
    </base-button>
    <base-button text @click="$router.push({ name: 'qa' })">
      よくある質問
    </base-button>
    <base-button text @click="$router.push({ name: 'message' })">
      メッセージ
    </base-button>
    <v-menu v-if="isLogin()" open-on-hover top offset-y>
      <template v-slot:activator="{ on }">
        <v-btn text v-on="on">
          マイページ
        </v-btn>
      </template>
      <v-list>
        <v-list-item v-for="(item, index) in items" :key="index" @click="$router.push({ name: item.title })">
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
    <base-button v-if="!isLogin()" text @click="$router.push({ name: 'login' })">
      ログイン
    </base-button>
    <base-button v-if="!isLogin()" text @click="$router.push({ name: 'registration' })">
      会員登録
    </base-button>
    <base-button v-if="isLogin()" text @click="$router.push({ name: 'logout' })">
      ログアウト
    </base-button>
  </v-app-bar>
</template>

<script>
export default {
  name: 'TheHeader',
  components: {
    BaseButton: () => import('~/components/atoms/buttons/BaseButton'),
    BrandLogo: () => import('~/components/atoms/BrandLogo'),
  },
  data: () => ({
    items: [
      {
        title: 'a',
      },
      {
        title: 'b',
      },
      {
        title: 'c',
      },
    ],
  }),
  mounted() {
    this.isLogin()
  },

  // ログイン済みかどうか
  methods: {
    isLogin() {
      // return authStore.user.key != ''
      return false
    },
    // logout() {
    //   authStore.logout()
    //   .then(() => {
    //   })
    //   .catch(error => {
    //     console.log(error)
    //   })
    // }
  },
}
</script>

<style></style>
